<?php

namespace IDW\JOBINTERVIEW\Server\Entity;

class Question
{
    /**
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
    public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getLabel(){
		return $this->label;
	}

	public function setLabel($label){
		$this->label = $label;
	}

	public function getOptions(){
		return $this->options;
	}

	public function setOptions($options){
		$this->options = $options;
	}

	public function getAnswer(){
		return $this->answer;
	}

	public function setAnswer($answer){
		$this->answer = $answer;
	}
}
