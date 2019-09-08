<?php

namespace IWD\JOBINTERVIEW\Server\Entity\Aggregate;

class DateAggregate extends AggregateAbstract implements AggregateInterface
{
    public function __construct($label = "")
    {
        $this->type = "date";
        $this->label = $label;
        $this->number = 0;
        $this->data = [];
        $this->aggregate = [];
    }

    public function aggregateData($question) {
        $answer = $question->getAnswer();
        if($this->number == 0){
            $this->label = $question->getLabel();
        }
        array_push($this->data, $answer);
        $this->number++;
    }

    public function formatAggregate() {
        $this->aggregate = $this->data;
    }

    public function getAggregate() {
        return $this->aggregate;
    }
}
