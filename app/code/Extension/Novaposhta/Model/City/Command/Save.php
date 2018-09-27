<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/13/18
 * Time: 4:18 PM
 */

namespace Extension\Novaposhta\Model\City\Command;

use Extension\Novaposhta\Api\Data\CityInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Extension\Novaposhta\Model\ResourceModel\City as CityResourceModel;
use Psr\Log\LoggerInterface;

/**
 * @inheritdoc
 */
class Save implements SaveInterface
{
    /**
     * @var CityResourceModel
     */
    private $cityResource;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param CityResourceModel $cityResource
     * @param LoggerInterface $logger
     */
    public function __construct(
        CityResourceModel $cityResource,
        LoggerInterface $logger
    ) {
        $this->cityResource = $cityResource;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function execute(CityInterface $city): int
    {
        try {
            $this->cityResource->save($city);

            return (int)$city->getCityId();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new CouldNotSaveException(__('Could not save City'), $e);
        }
    }
}