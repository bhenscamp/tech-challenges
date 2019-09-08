<?php

namespace IWD\JOBINTERVIEW\Server\Entity;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="Survey",
 *      description="Survey",
 *      @OA\Property(type="string", property="name", description="survey's name"),
 *      @OA\Property(type="string", property="code", description="ID")
 * )
 */
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
