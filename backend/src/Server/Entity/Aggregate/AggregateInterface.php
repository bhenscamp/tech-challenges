<?php

namespace IWD\JOBINTERVIEW\Server\Entity\Aggregate;

/**
 * interface required to be implemented in your aggregate class if you want to add new aggregate
 */
interface AggregateInterface
{
    /**
     * method to populate and aggregate data
     * @param array $question   contains raw data to be aggregate
     */
    public function aggregateData($question);
    /**
     * format data aggregated
     */
    public function formatAggregate();
    /**
     * return formated aggregated data
     */
    public function getAggregate();
}