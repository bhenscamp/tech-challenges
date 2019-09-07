<?php

namespace IDW\JOBINTERVIEW\Server\Controller;

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
     *              type="array",
     *              description="survey",
     *              @OA\Items(ref="#/components/schemas/Survey")
     *          )
     *      )
     * )
     */
    public function listSurvey(){
        
    }

    /**
     * @OA\Get(
     *      path="/surveys/{code}",
     *      @OA\Parameter(
     *          name="code",
     *          in="path",
     *          description="code of survey",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="a survey identified by code",
     *          @OA\JsonContent(ref="#/components/schemas/Survey")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          ref="#/components/responses/NotFound"
     *      ),
     * )
     */
    public function getSurvey($code){
        
    }
}
