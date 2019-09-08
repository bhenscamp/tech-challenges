<?php

namespace IWD\JOBINTERVIEW\Server\Controller;

use IWD\JOBINTERVIEW\Server\DAO\SurveyDao;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use OpenApi\Annotations as OA;


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
     *          description="a survey identified by code",
     *          @OA\JsonContent(ref="#/components/schemas/SurveyInfo")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          ref="#/components/responses/NotFound"
     *      ),
     * )
     */
    public function getSurvey($code)
    { }

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
    { }

    /**
     * @return mixed
     */
    protected function getDatas()
    {
        $directory = new \FilesystemIterator("./data");
        $dao = new SurveyDao($directory);
        $surveys = $dao->findAll();
        return $surveys;
    }
}
