<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/8/18
 * Time: 4:03 PM
 */

namespace Extension\Novaposhta\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface WarehouseSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get warehouses list.
     *
     * @return \Extension\Novaposhta\Api\Data\WarehouseInterface[]
     */
    public function getItems();

    /**
     * Set warehouses list.
     *
     * @param \Extension\Novaposhta\Api\Data\WarehouseInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
