<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 11:50 AM
 */
namespace Extension\Novaposhta\Model\Warehouse\Command;

use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Extension\Novaposhta\Model\ResourceModel\Warehouse as WarehouseResourceModel;
use Psr\Log\LoggerInterface;

/**
 * @inheritdoc
 */
class Save implements SaveInterface
{
    /**
     * @var WarehouseResourceModel
     */
    private $warehouseResource;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param WarehouseResourceModel $warehouseResource
     * @param LoggerInterface $logger
     */
    public function __construct(
        WarehouseResourceModel $warehouseResource,
        LoggerInterface $logger
    ) {
        $this->warehouseResource = $warehouseResource;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function execute(WarehouseInterface $warehouse): int
    {
        try {
            $this->warehouseResource->save($warehouse);

            return (int)$warehouse->getId();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new CouldNotSaveException(__('Could not save Warehouse'), $e);
        }
    }
}
