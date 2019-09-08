<?php

use OpenApi\Annotations as OA;

/** 
 * @OA\Info(title="IDW backend interview", version="0.1")
 * @OA\Server(
 *      url="http://localhost:8080/api/v1",
 *      description="api for IDW backend interview"
 * )
 */

 /**
 * response
 */
/**
 * @OA\Response(
 *      response="NotFound",
 *      description="Resource not found",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="survey not found")
 *      )
 * )
 */

/**
 * enum
 */
/**
 * @OA\Schema(
 *   schema="question_type",
 *   type="string",
 *   description="possible types of question",
 *   enum={"qcm", "numeric", "date"},
 *   default="qcm"
 * )
 */