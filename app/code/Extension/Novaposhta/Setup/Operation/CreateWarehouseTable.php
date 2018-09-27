<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/21/18
 * Time: 5:03 PM
 */

namespace Extension\Novaposhta\Setup\Operation;


use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\SchemaSetupInterface;
use Extension\Novaposhta\Model\ResourceModel\Warehouse as WarehouseResourceModel;

class CreateWarehouseTable
{
    /**
     * @param SchemaSetupInterface $setup
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function execute(SchemaSetupInterface $setup)
    {
        $warehouseTable = $this->createWarehouseTable($setup);

        $setup->getConnection()->createTable($warehouseTable);
    }

    /**
     * @param SchemaSetupInterface $setup
     * @return Table
     * @throws \Zend_Db_Exception
     */
    private function createWarehouseTable(SchemaSetupInterface $setup): Table
    {
        $warehouseTable = $setup->getConnection()->getTableName(WarehouseResourceModel::TABLE_NAME_WAREHOUSE);

        return $setup->getConnection()->newTable(
            $warehouseTable
        )->setComment(
            'Novaposhta Warehouse Table'
        )->addColumn(
            'ref',
            Table::TYPE_TEXT,
            null,
            ['nullable' => false],
            'Warehouse Reference'
        )->addColumn(
            'site_key',
            Table::TYPE_DECIMAL,
            null,
            ['nullable' => false],
            'Warehouse code'
        )->addColumn(
            'description',
            Table::TYPE_TEXT,
            200,
            [],
            'Address on Ukrainian'
        )->addColumn(
            'description_ru',
            Table::TYPE_TEXT,
            200,
            [],
            'Address on Russian'
        )->addColumn(
            'city_ref',
            Table::TYPE_TEXT,
            null,
            ['nullable' => false],
            'City Reference'
        )->addColumn(
            'city_description',
            Table::TYPE_TEXT,
            null,
            ['nullable' => false],
            'City Name on Ukrainian'
        )->addColumn(
            'city_description_ru',
            Table::TYPE_TEXT,
            null,
            ['nullable' => false],
            'City Name on Russian'
        )->addColumn(
            'phone',
            Table::TYPE_TEXT,
            200,
            ['nullable' => false],
            'Warehouse Phone'
        )->addColumn(
            'weekday_work_hours',
            Table::TYPE_TEXT,
            20,
            ['nullable' => false],
            'Warehouse Work Hours'
        )->addColumn(
            'weekday_receiving_hours',
            Table::TYPE_TEXT,
            20,
            ['nullable' => false],
            'Warehouse Receiving Hours'
        )->addColumn(
            'weekday_delivery_hours',
            Table::TYPE_TEXT,
            20,
            ['nullable' => false],
            'Warehouse Delivery Hours'
        )->addColumn(
            'saturday_work_hours',
            Table::TYPE_TEXT,
            20,
            ['nullable' => false],
            'Warehouse Saturday Work Hours'
        )->addColumn(
            'saturday_receiving_hours',
            Table::TYPE_TEXT,
            20,
            ['nullable' => false],
            'Warehouse Saturday Receiving Hours'
        )->addColumn(
            'saturday_delivery_hours',
            Table::TYPE_TEXT,
            20,
            ['nullable' => false],
            'Warehouse Saturday Delivery Hours'
        )->addColumn(
            'max_weight_allowed',
            Table::TYPE_INTEGER,
            4,
            ['nullable' => false],
            'Allowed Max Weight'
        )->addColumn(
            'longitude',
            Table::TYPE_FLOAT,
            [10, 6],
            ['nullable' => false],
            'Longitude'
        )->addColumn(
            'latitude',
            Table::TYPE_FLOAT,
            [10, 6],
            ['nullable' => false],
            'Latitude'
        )->addColumn(
            'number',
            Table::TYPE_INTEGER,
            3,
            ['unsigned' => true, 'nullable' => false],
            'Warehouse number'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Warehouse Modification Time'
        )->addIndex(
            $setup->getIdxName(
                'novaposhta_warehouse',
                ['ref', 'city_ref', 'city_description', 'city_description_ru', 'description', 'description_ru'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            ['ref', 'city_ref', 'city_description', 'city_description_ru', 'description', 'description_ru'],
            ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        );
    }
}
