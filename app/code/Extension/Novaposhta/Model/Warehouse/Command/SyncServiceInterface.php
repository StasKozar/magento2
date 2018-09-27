<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/26/18
 * Time: 2:34 PM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;


interface SyncServiceInterface
{
    const MODEL_NAME = 'AddressGeneral';
    const METHOD_NAME = 'getWarehouses';

    /**
     * Synchronize warehouse data with NovaPoshta API service.
     *
     * @return array
     */
    public function execute();
}
