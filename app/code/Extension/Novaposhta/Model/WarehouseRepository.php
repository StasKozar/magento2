<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/8/18
 * Time: 4:12 PM
 */

namespace Extension\Novaposhta\Model;

use Extension\Novaposhta\Model\Warehouse\Command\DeleteByIdInterface;
use Extension\Novaposhta\Model\Warehouse\Command\GetInterface;
use Extension\Novaposhta\Model\Warehouse\Command\GetListInterface;
use Extension\Novaposhta\Model\Warehouse\Command\SaveInterface;
use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Extension\Novaposhta\Api\Data\WarehouseSearchResultsInterface;
use Extension\Novaposhta\Api\WarehouseRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * @inheritdoc
 */
class WarehouseRepository implements WarehouseRepositoryInterface
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
    public function save(WarehouseInterface $warehouse): int
    {
        return $this->commandSave->execute($warehouse);
    }

    /**
     * @inheritdoc
     */
    public function get(int $warehouseId): WarehouseInterface
    {
        return $this->commandGet->execute($warehouseId);
    }

    /**
     * @inheritdoc
     */
    public function deleteById(int $warehouseId)
    {
        $this->commandDeleteById->execute($warehouseId);
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): WarehouseSearchResultsInterface
    {
        return $this->commandGetList->execute($searchCriteria);
    }
}
