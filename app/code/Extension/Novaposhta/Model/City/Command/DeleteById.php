<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 4:01 PM
 */

namespace Extension\Novaposhta\Model\City\Command;

use Extension\Novaposhta\Model\ResourceModel\City as CityResourceModel;
use Extension\Novaposhta\Api\Data\CityInterface;
use Extension\Novaposhta\Api\Data\CityInterfaceFactory;
use Psr\Log\LoggerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * @inheritdoc
 */
class DeleteById implements DeleteByIdInterface
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
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param CityResourceModel $cityResource
     * @param CityInterfaceFactory $cityFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        CityResourceModel $cityResource,
        CityInterfaceFactory $cityFactory,
        LoggerInterface $logger
    ) {
        $this->cityResource = $cityResource;
        $this->cityFactory = $cityFactory;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function execute(int $cityId)
    {
        /** @var CityInterface $city */
        $city = $this->cityFactory->create();
        $this->cityResource->load($city, $cityId, CityInterface::CITY_ID);

        if (null === $city->getId()) {
            return;
        }

        try {
            $this->cityResource->delete($city);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new CouldNotDeleteException(__('Could not delete City'), $e);
        }
    }
}
