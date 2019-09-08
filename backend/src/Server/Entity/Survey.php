<?php

namespace IDW\JOBINTERVIEW\Server\Entity;

class Survey
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
     * @var array
     */
    protected $questions;


    /**
     * accessors
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getQuestions(){
		return $this->questions;
	}

	public function setQuestions($questions){
		$this->questions = $questions;
	}
}
