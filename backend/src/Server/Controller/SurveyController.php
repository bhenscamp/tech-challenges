<?php

namespace IWD\JOBINTERVIEW\Server\Controller;

use IWD\JOBINTERVIEW\Server\DAO\SurveyDao;
use IWD\JOBINTERVIEW\Server\Entity\Aggregate\DateAggregate;
use IWD\JOBINTERVIEW\Server\Entity\Aggregate\NumberAggregate;
use IWD\JOBINTERVIEW\Server\Entity\Aggregate\QcmAggregate;
use IWD\JOBINTERVIEW\Server\Entity\SurveyAggregate;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use OpenApi\Annotations as OA;
use PHPUnit\Util\TestDox\ResultPrinter;

class SurveyController
{
    /**
     * @var \Serializer
     */
    protected $serializer;

    public function __construct()
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @OA\Get(
     *      path="/surveys",
     *      @OA\Response(
     *          response="200",
     *          description="list of surveys",
     *          @OA\JsonContent(
     *              type="array",
     *              description="survey",
     *              @OA\Items(ref="#/components/schemas/Survey")
     *          )
     *      )
     * )
     */
    public function listSurvey()
    {
        $result = [];
        $data = $this->getDatas();
        foreach ($data as $key => $surveyInfo) {
            array_push($result, $surveyInfo->getSurvey());
        }

        $surveys = array_unique($result, SORT_REGULAR);
        return $this->serializer->serialize($surveys, 'json');
    }

    /**
     * @OA\Get(
     *      path="/surveys/{code}",
     *      @OA\Parameter(
     *          name="code",
     *          in="path",
     *          description="code of survey",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="a list of surveys identified by code",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SurveyInfo"))
     *      ),
     *      @OA\Response(
     *          response="404",
     *          ref="#/components/responses/NotFound"
     *      ),
     * )
     */
    public function getSurvey($code)
    {
        $result = $this->getSurveysWithCode($code);

        return $this->serializer->serialize($result, 'json');
    }

    /**
     * @OA\Get(
     *      path="/surveys/{code}/aggregate",
     *      @OA\Parameter(
     *          name="code",
     *          in="path",
     *          description="code of survey",
     *          required=true,
     *          @OA\schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="survey with aggregate answers",
     *          @OA\JsonContent(ref="#/components/schemas/SurveyInfo")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          ref="#/components/responses/NotFound"
     *      )
     * )
     */
    public function getAggregatedSurvey($code)
    {
        $result = $this->getSurveysWithCode($code);
        
        $aggregatedSurvey = new SurveyAggregate();
        $aggregatedSurvey->setName($result[0]->getSurvey()->getName());
        $aggregatedSurvey->setCode($result[0]->getSurvey()->getCode());
        $aggregates = [
            'qcm' => new QcmAggregate(),
            'numeric' => new NumberAggregate(),
            'date' => new DateAggregate()
        ];

        foreach ($result as $key => $survey) {
            $aggregatedSurvey->setNumber($aggregatedSurvey->getNumber() + 1);
            foreach ($survey->getQuestions() as $key => $question) {
                switch ($question->getType()) {
                    case 'qcm':
                        $aggregates['qcm']->aggregateData($question);
                        $aggregates['qcm']->formatAggregate();
                        break;
                    case 'numeric':
                        $aggregates['numeric']->aggregateData($question);
                        $aggregates['numeric']->formatAggregate();
                        break;
                    case 'date':
                        $aggregates['date']->aggregateData($question);
                        $aggregates['date']->formatAggregate();
                    default:
                        break;
                }
            }
        }
        
        $aggregatedSurvey->setAggregates($this->aggregatesDecorator($aggregates));

        return $this->serializer->serialize($aggregatedSurvey, 'json');
    }

    /**
     * get data from directory
     * @return mixed
     */
    protected function getDatas()
    {
        $directory = new \FilesystemIterator("./data");
        $dao = new SurveyDao($directory);
        $surveys = $dao->retrieveAll();
        return $surveys;
    }

    /**
     * parse data and extract surveys with code in param
     * @return array
     */
    protected function getSurveysWithCode($code)
    {
        $data = $this->getDatas();
        $surveys = [];
        foreach ($data as $key => $surveyInfo) {
            if ($surveyInfo->getSurvey()->getCode() == $code)
                array_push($surveys, $surveyInfo);
        }
        return $surveys;
    }

    protected function aggregatesDecorator($aggregates)
    {
        $decoratedAggregates = [];
        foreach ($aggregates as $key => $aggregate) {
            $decoratedAggregates[$aggregate->getType()] = [
                'label' => $aggregate->getLabel(),
                'number of response' => $aggregate->getNumber(),
                'aggregated answer' => $aggregate->getAggregate()
            ];
        }
        return $decoratedAggregates;
    }
}
