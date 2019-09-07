<?php

namespace IDW\JOBINTERVIEW\Server\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="Survey",
 *      description="Survey",
 *      @OA\Property(type="string", property="name", description="survey's name"),
 *      @OA\Property(type="string", property="code", description="ID")
 * )
 */
class SurveyNormalizer implements NormalizerInterface
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
        return $data instanceof \IDW\JOBINTERVIEW\Server\Entity\Survey;
    }
}
