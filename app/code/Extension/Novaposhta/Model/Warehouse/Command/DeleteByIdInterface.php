<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 2:05 PM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Warehouse by Id command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial Delete call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \Extension\Novaposhta\Api\WarehouseRepositoryInterface
 * @api
 */
interface DeleteByIdInterface
{
    /**
     * Delete the Warehouse data by Id. If warehouse is not found do nothing
     *
     * @param int $warehouseId
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $warehouseId);
}
