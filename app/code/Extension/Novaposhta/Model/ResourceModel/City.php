<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/5/18
 * Time: 10:13 AM
 */

namespace Extension\Novaposhta\Model\ResourceModel;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class City extends AbstractDb
{
    /**
     * Provides possibility of saving entity with predefined/pre-generated id
     */
    use PredefinedId;

    /**
     * Constants related to specific db layer
     */
    const TABLE_NAME_CITY = 'novaposhta_city';

    public function _construct()
    {
        $this->_init(self::TABLE_NAME_CITY, 'city_id');
    }
}
