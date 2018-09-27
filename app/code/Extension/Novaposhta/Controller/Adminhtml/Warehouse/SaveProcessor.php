<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/28/18
 * Time: 2:14 PM
 */

namespace Extension\Novaposhta\Controller\Adminhtml\Warehouse;


use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Extension\Novaposhta\Api\Data\WarehouseInterfaceFactory;
use Extension\Novaposhta\Api\WarehouseRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;

class SaveProcessor
{
    /**
     * @var $city WarehouseInterface
     */
    private $warehouse;

    /**
     * @var $cityFactory WarehouseInterfaceFactory
     */
    private $warehouseFactory;

    /**
     * @var $cityRepository WarehouseRepositoryInterface
     */
    private $warehouseRepository;

    /**
     * @var $dataObjectHelper DataObjectHelper
     */
    private $dataObjectHelper;

    public function __construct(
        WarehouseInterface $warehouse,
        WarehouseInterfaceFactory $warehouseFactory,
        WarehouseRepositoryInterface $warehouseRepository,
        DataObjectHelper $dataObjectHelper
    )
    {
        $this->warehouse = $warehouse;
        $this->warehouseFactory = $warehouseFactory;
        $this->warehouseRepository = $warehouseRepository;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @param array $data
     * @return void
     */
    public function process(array $data)
    {
        foreach ($data as $warehouseData) {
            $warehouse = $this->warehouseFactory->create();
            $this->dataObjectHelper->populateWithArray($warehouse, $warehouseData, WarehouseInterface::class);
            $this->warehouseRepository->save($warehouse);
        }
    }
}
