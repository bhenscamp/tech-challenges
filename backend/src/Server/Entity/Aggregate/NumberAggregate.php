<?php

namespace IWD\JOBINTERVIEW\Server\Entity;

class NumberAggregate extends AggregateAbstract
{
    public function __construct($label)
    {
        $this->type = "number";
        $this->label = $label;
        $this->number = 0;
        $this->data = [];
        $this->aggregate = 0;
    }

    public function aggregateData($answer)
    {
        array_push($this->data, $answer);
        $this->number++;
    }

    public function formatAggregate()
    {
        $this->aggregate = array_sum($this->data) / $this->number;
        $decorator = new \NumberFormatter('fr-FR', \NumberFormatter::DECIMAL);
        $decorator->format($this->aggregate);
    }
    public function getAggregate()
    {
        return $this;
    }
}
