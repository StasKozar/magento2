<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 11:45 AM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;

use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Save Warehouse data command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial Save call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \Extension\Novaposhta\Api\WarehouseRepositoryInterface
 * @api
 */
interface SaveInterface
{
    /**
     * Save Warehouse data
     *
     * @param WarehouseInterface $warehouse
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(WarehouseInterface $warehouse): int;
}
