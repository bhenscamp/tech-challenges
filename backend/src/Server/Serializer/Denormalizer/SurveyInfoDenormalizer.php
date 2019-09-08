<?php

namespace IWD\JOBINTERVIEW\Server\Serializer\Denormalizer;

use IWD\JOBINTERVIEW\Server\Entity\Question;
use IWD\JOBINTERVIEW\Server\Entity\Survey;
use IWD\JOBINTERVIEW\Server\Entity\SurveyInfo;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class SurveyInfoDenormalizer implements DenormalizerInterface
{ 
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $object = new SurveyInfo();
        $object->setSurvey($serializer->denormalize($data['survey'], Survey::class, $format, $context));

        $questions = [];
        foreach ($data['questions'] as $key => $question) {
            array_push($questions, $serializer->denormalize($question, Question::class, $format, $context));
        }
        $object->setQuestions($questions);
        return $object;
    }

    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return true;
    }
}
