<?php

namespace IDW\Server\Controller;

use OpenApi\Annotations as OA;

class SurveyController
{
    /**
     * @OA\Get(
     *      path="/surveys",
     *      @OA\Response(
     *          response="200",
     *          description="list of surveys",
     *          @OA\JsonContent(
     *              type="string",
     *              description="survey"
     *          )
     *      )
     * )
     */
    public function index(){
        
    }
}
