<?php

namespace IWD\JOBINTERVIEW\Server\Entity;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="SurveyInfo",
 *      description="Survey complete information",
 *      @OA\Property(property="survey", ref="#/components/schemas/Survey"),
 *      @OA\Property(type="array", property="questions", @OA\Items(ref="#/components/schemas/Question"))
 * )
 */
class SurveyInfo
{
    /**
     * @var \Survey
     */
    protected $survey;

    /**
     * @var \Question[]
     */
    protected $questions;


    /**
     * accessors
     */
    public function getSurvey()
    {
        return $this->survey;
    }

    public function setSurvey($survey)
    {
        $this->survey = $survey;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }
}