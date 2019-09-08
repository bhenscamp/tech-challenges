<?php

namespace IWD\JOBINTERVIEW\Server\Entity\Aggregate;

class NumberAggregate extends AggregateAbstract
{
    public function __construct($label = "")
    {
        $this->type = "numeric";
        $this->label = $label;
        $this->number = 0;
        $this->data = [];
        $this->aggregate = 0;
    }

    public function aggregateData($question)
    {
        $answer = $question->getAnswer();
        if($this->number == 0){
            $this->label = $question->getLabel();
        }
        array_push($this->data, $answer);
        $this->number++;
    }

    public function formatAggregate()
    {
        $this->aggregate = array_sum($this->data) / $this->number;
    }

    public function getAggregate()
    {
        return $this->aggregate;
    }
}
