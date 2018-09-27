<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/21/18
 * Time: 4:49 PM
 */

namespace Extension\Novaposhta\Setup\Operation;


use Extension\Novaposhta\Api\Data\CityInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\SchemaSetupInterface;
use Extension\Novaposhta\Model\ResourceModel\City as CityResourceModel;

class CreateCityTable
{
    /**
     * @param SchemaSetupInterface $setup
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function execute(SchemaSetupInterface $setup)
    {
        $cityTable = $this->createCityTable($setup);
        
        $setup->getConnection()->createTable($cityTable);
    }

    /**
     * @param SchemaSetupInterface $setup
     * @return Table
     * @throws \Zend_Db_Exception
     */
    private function createCityTable(SchemaSetupInterface $setup): Table
    {
        $cityTable = $setup->getTable(CityResourceModel::TABLE_NAME_CITY);
        
        return $setup->getConnection()->newTable(
            $cityTable
        )->setComment(
            'Novaposhta Cities Table'
        )->addColumn(
            CityInterface::REF,
            Table::TYPE_TEXT,
            null,
            ['nullable' => false],
            'City Reference'
        )->addColumn(
            CityInterface::DESCRIPTION,
            Table::TYPE_TEXT,
            100,
            ['nullable' => false],
            'City Name on Ukrainian'
        )->addColumn(
            CityInterface::DESCRIPTION_RU,
            Table::TYPE_TEXT,
            100,
            ['nullable' => false],
            'City Name on Russian'
        )->addColumn(
            CityInterface::CITY_ID,
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'City ID'
        )->addColumn(
            CityInterface::UPDATED_AT,
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'City Modification Time'
        )->addIndex(
            $setup->getIdxName(
                $cityTable,
                [
                    CityInterface::REF,
                    CityInterface::DESCRIPTION,
                    CityInterface::DESCRIPTION_RU,
                ],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            [
                CityInterface::REF,
                CityInterface::DESCRIPTION,
                CityInterface::DESCRIPTION_RU,
            ],
            ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        );
    }
}
