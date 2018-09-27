<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/5/18
 * Time: 10:24 AM
 */

namespace Extension\Novaposhta\Setup;


use Extension\Novaposhta\Setup\Operation\CreateCityTable;
use Extension\Novaposhta\Setup\Operation\CreateWarehouseTable;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /** @var CreateCityTable */
    private $createCityTable;

    /** @var CreateWarehouseTable */
    private $createWarehouseTable;

    /**
     * @param CreateCityTable $createCityTable
     * @param CreateWarehouseTable $createWarehouseTable
     */
    public function __construct(
        CreateCityTable $createCityTable,
        CreateWarehouseTable $createWarehouseTable
    )
    {
        $this->createCityTable = $createCityTable;
        $this->createWarehouseTable = $createWarehouseTable;
    }

    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $this->createCityTable->execute($setup);
        $this->createWarehouseTable->execute($setup);

        $setup->endSetup();
    }
}