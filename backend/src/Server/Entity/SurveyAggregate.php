<?php

namespace IWD\JOBINTERVIEW\Server\Entity;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="SurveyAggregate",
 *      description="Surveys with aggregated answers",
 *      @OA\Property(type="string", property="name", description="survey's name"),
 *      @OA\Property(type="string", property="code", description="ID"),
 *      @OA\Property(type="integer", property="number", description="number of answers"),
 *      @OA\Property(type="array", property="aggregates", description="aggregated answer", @OA\Items()),
 * )
 */
class SurveyAggregate
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var integer
     */
    protected $number;

    /**
     * @var array
     */
    protected $aggregates;

    /**
     * accessors
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getAggregates()
    {
        return $this->aggregates;
    }

    public function setAggregates($aggregates)
    {
        $this->aggregates = $aggregates;
    }

}
