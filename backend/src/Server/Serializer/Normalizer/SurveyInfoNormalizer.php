<?php

namespace IWD\JOBINTERVIEW\Server\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class SurveyInfoNormalizer implements NormalizerInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function normalize($object, $format = null, array $context = []): array
    {
        $data['survey'] = $this->normalizer->normalize($object->survey, $format, $context);
        $data['questions'] = $this->normalizer->normalize($object->questions, $format, $context);

        return $data;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof \IWD\JOBINTERVIEW\Server\Entity\SurveyInfo;
    }
}
