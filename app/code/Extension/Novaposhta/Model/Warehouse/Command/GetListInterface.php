<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 2:23 PM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;

use Magento\Framework\Api\SearchCriteriaInterface;
use Extension\Novaposhta\Api\Data\WarehouseSearchResultsInterface;

/**
 * Find Warehouses by SearchCriteria command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial GetList call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \Extension\Novaposhta\Api\WarehouseRepositoryInterface
 * @api
 */
interface GetListInterface
{
    /**
     * Find Warehouses by given SearchCriteria
     * SearchCriteria is not required because load all stocks is useful case
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return WarehouseSearchResultsInterface
     */
    public function execute(SearchCriteriaInterface $searchCriteria = null): WarehouseSearchResultsInterface;
}