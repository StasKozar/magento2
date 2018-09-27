<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/28/18
 * Time: 1:05 PM
 */
declare(strict_types=1);

namespace Extension\Novaposhta\Controller\Adminhtml\City;

use Extension\Novaposhta\Api\Data\CityInterface;
use Extension\Novaposhta\Api\Data\CityInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Extension\Novaposhta\Api\CityRepositoryInterface;

class SaveProcessor
{
    /**
     * @var $city CityInterface
     */
    private $city;

    /**
     * @var $cityFactory CityInterfaceFactory
     */
    private $cityFactory;

    /**
     * @var $cityRepository CityRepositoryInterface
     */
    private $cityRepository;

    /**
     * @var $dataObjectHelper DataObjectHelper
     */
    private $dataObjectHelper;

    public function __construct(
        CityInterface $city,
        CityInterfaceFactory $cityFactory,
        CityRepositoryInterface $cityRepository,
        DataObjectHelper $dataObjectHelper
    )
    {
        $this->city = $city;
        $this->cityFactory = $cityFactory;
        $this->cityRepository = $cityRepository;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @param array $data
     * @return void
     */
    public function process(array $data)
    {
        foreach ($data as $cityData) {
            $city = $this->cityFactory->create();
            $this->dataObjectHelper->populateWithArray($city, $cityData, CityInterface::class);
            $this->cityRepository->save($city);
        }
    }
}
