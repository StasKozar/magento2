<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 2:15 PM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;

use Magento\Framework\Exception\NoSuchEntityException;
use Extension\Novaposhta\Api\Data\WarehouseInterface;

/**
 * Get Warehouse by warehouseId command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial Get call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \Extension\Novaposhta\Api\WarehouseRepositoryInterface
 * @api
 */
interface GetInterface
{
    /**
     * Get Warehouse data by given warehouseId.
     *
     * @param int $warehouseId
     * @return WarehouseInterface
     * @throws NoSuchEntityException
     */
    public function execute(int $warehouseId): WarehouseInterface;
}