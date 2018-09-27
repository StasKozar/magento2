<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 4:17 PM
 */

namespace Extension\Novaposhta\Model\City\Command;

use Extension\Novaposhta\Api\Data\CityInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Save City data command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial Save call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \Extension\Novaposhta\Api\CityRepositoryInterface
 * @api
 */
interface SaveInterface
{
    /**
     * Save City data
     *
     * @param CityInterface $city
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(CityInterface $city): int;
}
