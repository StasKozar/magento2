<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 4:06 PM
 */

namespace Extension\Novaposhta\Model\City\Command;

use Magento\Framework\Exception\NoSuchEntityException;
use Extension\Novaposhta\Api\Data\CityInterface;

/**
 * Get City by cityId command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial Get call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \Extension\Novaposhta\Api\CityRepositoryInterface
 * @api
 */
interface GetInterface
{
    /**
     * Get City data by given cityId.
     *
     * @param int $cityId
     * @return CityInterface
     * @throws NoSuchEntityException
     */
    public function execute(int $cityId): CityInterface;
}
