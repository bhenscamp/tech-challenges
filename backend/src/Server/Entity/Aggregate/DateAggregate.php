<?php

namespace IWD\JOBINTERVIEW\Server\Entity;

class DateAggregate extends AggregateAbstract 
{
    public function __construct($label)
    {
        $this->type = "date";
        $this->label = $label;
        $this->number = 0;
        $this->data = [];
        $this->aggregate = [];
    }

    public function aggregateData($answer) {
        array_push($this->data, $answer);
        $this->number++;
    }

    public function formatAggregate() {
        $this->aggregate = $this->data;
    }

    public function getAggregate() {
        return $this;
    }
}
