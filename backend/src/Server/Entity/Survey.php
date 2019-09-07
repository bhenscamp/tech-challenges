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
}
