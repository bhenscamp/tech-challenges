<?php

namespace IWD\JOBINTERVIEW\Server\Entity;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="Question",
 *      description="question",
 *      @OA\Property(property="type", ref="#/components/schemas/question_type"),
 *      @OA\Property(type="string", property="label", description="the question"),
 *      @OA\Property(type="array", @OA\Items(type="string"), property="options", nullable=true, description="choices for qcm question"),
 *      @OA\Property(
 *          property="answer", 
 *          oneOf={
 *              @OA\Schema(type="string", format="date-time"), 
 *              @OA\Schema(type="integer"), 
 *              @OA\Schema(type="array", @OA\Items(type="boolean"))
 *          }, 
 *          description="answer could be an array for qcm, an integer or a date"
 *      )
 * )
 */
class Question
{
    /**
     * 
     * type of question, could be qcm, numeric or date
     * @var string
     */
    protected $type;

    /**
     * the question
     * @var string
     */
    protected $label;

    /**
     * use for qcm as multiple choices
     * @var array|null
     */
    protected $options;

    /**
     * answer depends on type and could be
     * array for qcm
     * integer for numeric
     * string (date) for date
     * @var array|integer|\DateTimeInterface
     */
    protected $answer;

    /**
     * accessors
     */
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }
}
