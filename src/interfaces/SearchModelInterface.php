<?php

namespace siripravi\materialdashboard\interfaces;

use yii\data\DataProviderInterface;
use yii\db\QueryInterface;
use yii\web\Request;

/**
 * Interface SearchModelInterface
 * @package siripravi\materialdashboard\interfaces
 *
 * @method self filterQuery(QueryInterface $query)  / optional
 * @method array autoFilters()                      / optional
 */
interface SearchModelInterface
{
    /**
     * @param Request $request
     * @return $this
     */
    public function search(Request $request): self;

    /**
     * @return DataProviderInterface
     */
    public function getDataProvider(): DataProviderInterface;


}