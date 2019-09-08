<?php

namespace IWD\JOBINTERVIEW\Server\Entity;

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
