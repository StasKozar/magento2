<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 2:08 PM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;

use Magento\Framework\Exception\CouldNotDeleteException;
use Extension\Novaposhta\Model\ResourceModel\Warehouse as WarehouseResourceModel;
use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Extension\Novaposhta\Api\Data\WarehouseInterfaceFactory;
use Psr\Log\LoggerInterface;

/**
 * @inheritdoc
 */
class DeleteById implements DeleteByIdInterface
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
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param WarehouseResourceModel $warehouseResource
     * @param WarehouseInterfaceFactory $warehouseFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        WarehouseResourceModel $warehouseResource,
        WarehouseInterfaceFactory $warehouseFactory,
        LoggerInterface $logger
    ) {
        $this->warehouseResource = $warehouseResource;
        $this->warehouseFactory = $warehouseFactory;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function execute(int $warehouseId)
    {
        /** @var WarehouseInterface $warehouse */
        $warehouse = $this->warehouseFactory->create();
        $this->warehouseResource->load($warehouse, $warehouseId, WarehouseInterface::WAREHOUSE_ID);

        if (null === $warehouse->getId()) {
            return;
        }

        try {
            $this->warehouseResource->delete($warehouse);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new CouldNotDeleteException(__('Could not delete Warehouse'), $e);
        }
    }
}
