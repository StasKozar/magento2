<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 4:11 PM
 */

namespace Extension\Novaposhta\Model\City\Command;

use Extension\Novaposhta\Api\Data\CitySearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Find Cities by SearchCriteria command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial GetList call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \Extension\Novaposhta\Api\CityRepositoryInterface
 * @api
 */
interface GetListInterface
{
    /**
     * Find Cities by given SearchCriteria
     * SearchCriteria is not required because load all stocks is useful case
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return CitySearchResultsInterface
     */
    public function execute(SearchCriteriaInterface $searchCriteria = null): CitySearchResultsInterface;
}
