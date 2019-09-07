<?php

namespace IDW\JOBINTERVIEW\Server\Controller;

use OpenApi\Annotations as OA;


/**
 * @OA\Response(
 *      response="NotFound",
 *      description="Resource not found",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="survey not found")
 *      )
 * )
 */
class AbstractController
{
    
}
