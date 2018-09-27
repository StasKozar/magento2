<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 2:25 PM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Extension\Novaposhta\Model\ResourceModel\Warehouse\Collection;
use Extension\Novaposhta\Model\ResourceModel\Warehouse\CollectionFactory;
use Extension\Novaposhta\Api\Data\WarehouseSearchResultsInterface;
use Extension\Novaposhta\Api\Data\WarehouseSearchResultsInterfaceFactory;

/**
 * @inheritdoc
 */
class GetList implements GetListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var CollectionFactory
     */
    private $warehouseCollectionFactory;

    /**
     * @var WarehouseSearchResultsInterfaceFactory
     */
    private $warehouseSearchResultsFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CollectionFactory $warehouseCollectionFactory
     * @param WarehouseSearchResultsInterfaceFactory $warehouseSearchResultsFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        CollectionFactory $warehouseCollectionFactory,
        WarehouseSearchResultsInterfaceFactory $warehouseSearchResultsFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->collectionProcessor = $collectionProcessor;
        $this->warehouseCollectionFactory = $warehouseCollectionFactory;
        $this->warehouseSearchResultsFactory = $warehouseSearchResultsFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritdoc
     */
    public function execute(SearchCriteriaInterface $searchCriteria = null): WarehouseSearchResultsInterface
    {
        /** @var Collection $collection */
        $collection = $this->warehouseCollectionFactory->create();

        if (null === $searchCriteria) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        /** @var WarehouseSearchResultsInterface $searchResult */
        $searchResult = $this->warehouseSearchResultsFactory->create();
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
