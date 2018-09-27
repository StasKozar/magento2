<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/5/18
 * Time: 10:20 AM
 */

namespace Extension\Novaposhta\Model\ResourceModel;


use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Warehouse extends AbstractDb
{
    /**
     * Provides possibility of saving entity with predefined/pre-generated id
     */
    use PredefinedId;

    /**
     * Constants related to specific db layer
     */
    const TABLE_NAME_WAREHOUSE = 'novaposhta_warehouse';

    public function _construct()
    {
        $this->_init(self::TABLE_NAME_WAREHOUSE, WarehouseInterface::REF);
    }
}