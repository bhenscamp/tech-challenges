<?php

namespace IDW\JOBINTERVIEW\Server\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="Question",
 *      description="question",
 *      @OA\Property(property="type", ref="#/components/schemas/question_type"),
 *      @OA\Property(type="string", property="label", description="the question"),
 *      @OA\Property(type="array", @OA\Items(type="string"), property="options", nullable=true, description="choices for qcm question"),
 *      @OA\Property(
 *          property="answer", 
 *          oneOf={
 *              @OA\Schema(type="string", format="date-time"), 
 *              @OA\Schema(type="integer"), 
 *              @OA\Schema(type="array", @OA\Items(type="boolean"))
 *          }, 
 *          description="answer could be an array for qcm, an integer or a date"
 *      )
 * )
 */
class QuestionNormalizer implements NormalizerInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function normalize($object, $format = null, array $context = []) : array
    {
        $data = $this->normalizer->normalize($object, $format, $context);

        return $data;
    }

    public function supportsNormalization($data, $format = null) : bool
    {
        return $data instanceof \IDW\JOBINTERVIEW\Server\Entity\Question;
    }   
}
