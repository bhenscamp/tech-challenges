<?php

namespace IWD\JOBINTERVIEW\Server\Entity\Aggregate;

class AggregateAbstract
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var integer
     */
    protected $number;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var array|integer
     */
    protected $aggregate;

    /**
     * Accessors
     */
    public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getNumber(){
		return $this->number;
	}

	public function setNumber($number){
		$this->number = $number;
	}

	public function getLabel(){
		return $this->label;
	}

	public function setLabel($label){
		$this->label = $label;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getAggregate(){
		return $this->aggregate;
	}

	public function setAggregate($aggregate){
		$this->aggregate = $aggregate;
	}
}
