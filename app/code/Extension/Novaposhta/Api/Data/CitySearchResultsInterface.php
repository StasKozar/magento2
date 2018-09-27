<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 3:46 PM
 */

namespace Extension\Novaposhta\Api\Data;

/**
 * Search results of Repository::getList method
 *
 * Used fully qualified namespaces in annotations for proper work of WebApi request parser
 *
 * @api
 */
interface CitySearchResultsInterface
{
    /**
     * Get cities list.
     *
     * @return \Extension\Novaposhta\Api\Data\CityInterface[]
     */
    public function getItems();

    /**
     * Set cities list.
     *
     * @param \Extension\Novaposhta\Api\Data\CityInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
