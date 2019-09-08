<?php

namespace IWD\JOBINTERVIEW\Server\Entity;

class QcmAggregate extends AggregateAbstract 
{
    public function __construct($label)
    {
        $this->type = "qcm";
        $this->label = $label;
        $this->number = 0;
        $this->data = [];
        $this->aggregate = [];
    }

    public function aggregateData($options, $answer ) {
        array_walk($options, function(&$value, $key){
            $value = str_replace(" ", "_", $value);
        });
        $tmp = array_combine($options, $answer);
        extract($tmp);
        foreach ( $options as $option ) {
            if (!isset($this->data[$option])) {
                $this->data[$option]  = 0;
            } else {
                $number = $this->data[$option];
            }
            if ($$option === true) {
                $this->data[$option] += 1;
            }
        }
    }

    public function formatAggregate() {
        $this->aggregate = "";
        foreach( $this->data as $option => $number ) {
            $option = str_replace("_", " ", $option);
            $this->aggregate .= ",$number $option ";
        }
        $this->aggregate = substr($this->aggregate, 1);
        $this->aggregate = explode(",", $this->aggregate);
    }
    
    public function getAggregate() {
        return $this;
    }
}
