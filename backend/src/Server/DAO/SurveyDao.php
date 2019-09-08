<?php

namespace IWD\JOBINTERVIEW\Server\DAO;

use IWD\JOBINTERVIEW\Server\Entity\SurveyInfo;
use IWD\JOBINTERVIEW\Server\Serializer\Denormalizer\SurveyInfoDenormalizer;
use IWD\JOBINTERVIEW\Server\Serializer\Normalizer\SurveyInfoNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class SurveyDao
{
    /**
     * @var \FilesystemIterator
     */
    protected $directoryIterator;

    /**
     * @var \Serializer
     */
    protected $serializer;

    public function __construct(\FilesystemIterator $directory)
    {
        $this->setDirectoryIterator($directory);
        
        $encoders = array(new JsonEncoder());
        $normalizers = array(
            new SurveyInfoNormalizer(new ObjectNormalizer()),
            new SurveyInfoDenormalizer(new ObjectNormalizer())
        );
        $this->serializer = new Serializer($normalizers, $encoders);   
    }

    public function retrieveAll()
    {
        foreach ($this->getDirectoryIterator() as $file) {
            $entries[$file->getFilename()] = $this->serializer->deserialize(
                file_get_contents($file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename()),
                SurveyInfo::class,
                'json'
            );
        }
        return $entries;
    }
    /**
     * @return \FilesystemIterator
     */
    public function getDirectoryIterator(): \FilesystemIterator
    {
        return $this->directoryIterator;
    }
    /**
     * @param \FilesystemIterator $directoryIterator
     * @return Survey
     */
    public function setDirectoryIterator(\FilesystemIterator $directoryIterator): SurveyDao
    {
        $this->directoryIterator = $directoryIterator;
        return $this;
    }
}
