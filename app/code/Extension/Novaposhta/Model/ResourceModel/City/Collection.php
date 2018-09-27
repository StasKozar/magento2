<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/5/18
 * Time: 10:14 AM
 */

namespace Extension\Novaposhta\Model\ResourceModel\City;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(
            \Extension\Novaposhta\Model\City::class,
            \Extension\Novaposhta\Model\ResourceModel\City::class
        );
    }
}