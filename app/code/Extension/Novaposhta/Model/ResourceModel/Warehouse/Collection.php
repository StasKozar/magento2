<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/5/18
 * Time: 10:20 AM
 */

namespace Extension\Novaposhta\Model\ResourceModel\Warehouse;


use Extension\Novaposhta\Model\ResourceModel\Warehouse as WarehouseResource;
use Extension\Novaposhta\Model\Warehouse as WarehouseModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(WarehouseModel::class, WarehouseResource::class);
    }
}