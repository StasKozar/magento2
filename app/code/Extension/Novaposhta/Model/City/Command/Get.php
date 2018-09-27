<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 4:07 PM
 */

namespace Extension\Novaposhta\Model\City\Command;

use Magento\Framework\Exception\NoSuchEntityException;
use Extension\Novaposhta\Model\ResourceModel\City as CityResourceModel;
use Extension\Novaposhta\Api\Data\CityInterface;
use Extension\Novaposhta\Api\Data\CityInterfaceFactory;

/**
 * @inheritdoc
 */
class Get implements GetInterface
{
    /**
     * @var CityResourceModel
     */
    private $cityResource;

    /**
     * @var CityInterfaceFactory
     */
    private $cityFactory;

    /**
     * @param CityResourceModel $cityResource
     * @param CityInterfaceFactory $cityFactory
     */
    public function __construct(
        CityResourceModel $cityResource,
        CityInterfaceFactory $cityFactory
    ) {
        $this->cityResource = $cityResource;
        $this->cityFactory = $cityFactory;
    }

    /**
     * @inheritdoc
     */
    public function execute(int $cityId): CityInterface
    {
        /** @var CityInterface $city */
        $city = $this->cityFactory->create();
        $this->cityResource->load($city, $cityId, CityInterface::CITY_ID);

        if (null === $city->getId()) {
            throw new NoSuchEntityException(
                __('City with id "%value" does not exist.', ['value' => $cityId])
            );
        }

        return $city;
    }
}
