<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 3:58 PM
 */

namespace Extension\Novaposhta\Model;

use Extension\Novaposhta\Model\City\Command\DeleteByIdInterface;
use Extension\Novaposhta\Model\City\Command\GetInterface;
use Extension\Novaposhta\Model\City\Command\GetListInterface;
use Extension\Novaposhta\Model\City\Command\SaveInterface;
use Extension\Novaposhta\Api\Data\CityInterface;
use Extension\Novaposhta\Api\Data\CitySearchResultsInterface;
use Extension\Novaposhta\Api\CityRepositoryInterface;
use Extension\Novaposhta\Model\City\Command\UpdateInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * @inheritdoc
 */
class CityRepository implements CityRepositoryInterface
{

    /**
     * @var SaveInterface
     */
    private $commandSave;

    /**
     * @var GetInterface
     */
    private $commandGet;

    /**
     * @var DeleteByIdInterface
     */
    private $commandDeleteById;

    /**
     * @var GetListInterface
     */
    private $commandGetList;

    /**
     * @param SaveInterface $commandSave
     * @param GetInterface $commandGet
     * @param DeleteByIdInterface $commandDeleteById
     * @param GetListInterface $commandGetList
     * @param UpdateInterface $commandUpdate
     */
    public function __construct(
        SaveInterface $commandSave,
        GetInterface $commandGet,
        DeleteByIdInterface $commandDeleteById,
        GetListInterface $commandGetList
    ) {
        $this->commandSave = $commandSave;
        $this->commandGet = $commandGet;
        $this->commandDeleteById = $commandDeleteById;
        $this->commandGetList = $commandGetList;
    }

    /**
     * @inheritdoc
     */
    public function save(CityInterface $city): int
    {
        return $this->commandSave->execute($city);
    }

    /**
     * @inheritdoc
     */
    public function get(int $cityId): CityInterface
    {
        return $this->commandGet->execute($cityId);
    }

    /**
     * @inheritdoc
     */
    public function deleteById(int $cityId)
    {
        $this->commandDeleteById->execute($cityId);
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): CitySearchResultsInterface
    {
        return $this->commandGetList->execute($searchCriteria);
    }
}