<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 4:13 PM
 */

namespace Extension\Novaposhta\Model\City\Command;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Extension\Novaposhta\Model\ResourceModel\City\Collection;
use Extension\Novaposhta\Model\ResourceModel\City\CollectionFactory;
use Extension\Novaposhta\Api\Data\CitySearchResultsInterface;
use Extension\Novaposhta\Api\Data\CitySearchResultsInterfaceFactory;

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
    private $cityCollectionFactory;

    /**
     * @var CitySearchResultsInterfaceFactory
     */
    private $citySearchResultsFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CollectionFactory $cityCollectionFactory
     * @param CitySearchResultsInterfaceFactory $citySearchResultsFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        CollectionProcessorInterface $collectionProcessor,
        CollectionFactory $cityCollectionFactory,
        CitySearchResultsInterfaceFactory $citySearchResultsFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->collectionProcessor = $collectionProcessor;
        $this->cityCollectionFactory = $cityCollectionFactory;
        $this->citySearchResultsFactory = $citySearchResultsFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritdoc
     */
    public function execute(SearchCriteriaInterface $searchCriteria = null): CitySearchResultsInterface
    {
        /** @var Collection $collection */
        $collection = $this->cityCollectionFactory->create();

        if (null === $searchCriteria) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        /** @var CitySearchResultsInterface $searchResult */
        $searchResult = $this->citySearchResultsFactory->create();
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
