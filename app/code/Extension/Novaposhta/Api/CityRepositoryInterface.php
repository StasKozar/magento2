<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 3:55 PM
 */

namespace Extension\Novaposhta\Api;


use Extension\Novaposhta\Api\Data\CityInterface;
use Extension\Novaposhta\Api\Data\CitySearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface CityRepositoryInterface
{
    /**
     * Save city.
     *
     * @param \Extension\Novaposhta\Api\Data\CityInterface $city
     * @return void
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(CityInterface $city);

    /**
     * Retrieve city.
     *
     * @param int $cityId
     * @return \Extension\Novaposhta\Api\Data\CityInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get(int $cityId): CityInterface;

    /**
     * Retrieve cities matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Extension\Novaposhta\Api\Data\CitySearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): CitySearchResultsInterface;

    /**
     * Delete city by ID. If warehouse not found do nothing.
     *
     * @param int $cityId
     * @return void
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById(int $cityId);
}
