<?php

namespace IDW\JOBINTERVIEW\Server\Entity;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class Survey
{
    /**
     * @OA\Property(type="string", description="survey's name")
     * @var string
     */
    protected $name;

    /**
     * @OA\Property(type="string", description="ID")
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
