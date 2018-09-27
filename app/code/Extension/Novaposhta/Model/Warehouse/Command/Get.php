<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 2:17 PM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;

use Magento\Framework\Exception\NoSuchEntityException;
use Extension\Novaposhta\Model\ResourceModel\Warehouse as WarehouseResourceModel;
use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Extension\Novaposhta\Api\Data\WarehouseInterfaceFactory;

/**
 * @inheritdoc
 */
class Get implements GetInterface
{
    /**
     * @var WarehouseResourceModel
     */
    private $warehouseResource;

    /**
     * @var WarehouseInterfaceFactory
     */
    private $warehouseFactory;

    /**
     * @param WarehouseResourceModel $warehouseResource
     * @param WarehouseInterfaceFactory $warehouseFactory
     */
    public function __construct(
        WarehouseResourceModel $warehouseResource,
        WarehouseInterfaceFactory $warehouseFactory
    ) {
        $this->warehouseResource = $warehouseResource;
        $this->warehouseFactory = $warehouseFactory;
    }

    /**
     * @inheritdoc
     */
    public function execute(int $warehouseId): WarehouseInterface
    {
        /** @var WarehouseInterface $warehouse */
        $warehouse = $this->warehouseFactory->create();
        $this->warehouseResource->load($warehouse, $warehouseId, WarehouseInterface::WAREHOUSE_ID);

        if (null === $warehouse->getId()) {
            throw new NoSuchEntityException(
                __('Warehouse with id "%value" does not exist.', ['value' => $warehouseId])
            );
        }

        return $warehouse;
    }
}
