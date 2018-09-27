<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/8/18
 * Time: 3:58 PM
 */

namespace Extension\Novaposhta\Api;

use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Extension\Novaposhta\Api\Data\WarehouseSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface WarehouseRepositoryInterface
{
    /**
     * Save warehouse.
     *
     * @param \Extension\Novaposhta\Api\Data\WarehouseInterface $warehouse
     * @return void
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(WarehouseInterface $warehouse);

    /**
     * Retrieve warehouse.
     *
     * @param int $warehouseId
     * @return \Extension\Novaposhta\Api\Data\WarehouseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get(int $warehouseId): WarehouseInterface;

    /**
     * Retrieve warehouses matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Extension\Novaposhta\Api\Data\WarehouseSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): WarehouseSearchResultsInterface;

    /**
     * Delete warehouse by ID. If warehouse not found do nothing.
     *
     * @param int $warehouseId
     * @return void
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById(int $warehouseId);
}
