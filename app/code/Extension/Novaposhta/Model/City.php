<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/4/18
 * Time: 6:59 PM
 */

namespace Extension\Novaposhta\Model;

use Extension\Novaposhta\Api\Data\CityExtensionInterface;
use Extension\Novaposhta\Api\Data\CityInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Model\AbstractExtensibleModel;

class City extends AbstractExtensibleModel implements CityInterface
{
    public function _construct()
    {
        $this->_init(\Extension\Novaposhta\Model\ResourceModel\City::class);
    }

    /**
     * Get reference.
     *
     * @return string
     */
    public function getRef()
    {
        return $this->getData(self::REF);
    }

    /**
     * Get city id.
     *
     * @return int
     */
    public function getCityID()
    {
        return $this->getData(self::CITY_ID);
    }

    /**
     * Get city name on russian.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Get city name on ukrainian.
     *
     * @return string
     */
    public function getDescriptionRu()
    {
        return $this->getData(self::DESCRIPTION_RU);
    }

    /**
     * Get updated at.
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set city reference.
     *
     * @param string $ref
     * @return void
     */
    public function setRef($ref)
    {
        $this->setData(self::REF, $ref);
    }

    /**
     * Set city id.
     *
     * @param int $cityId
     * @return void
     */
    public function setCityID($cityId)
    {
        $this->setData(self::CITY_ID, $cityId);
    }

    /**
     * Set city name on russian.
     *
     * @param string $descriptionRu
     * @return void
     */
    public function setDescriptionRu($descriptionRu)
    {
        $this->setData(self::DESCRIPTION_RU, $descriptionRu);
    }

    /**
     * Set city name on ukrainian.
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Set updated at.
     *
     * @param string $updatedAt
     * @return void
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes()
    {
        $extensionAttributes = $this->_getExtensionAttributes();
        if (null === $extensionAttributes) {
            $extensionAttributes = $this->extensionAttributesFactory->create(CityExtensionInterface::class);
            $this->setExtensionAttributes($extensionAttributes);
        }
        return $extensionAttributes;
    }

    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(CityExtensionInterface $extensionAttributes)
    {
        $this->_setExtensionAttributes($extensionAttributes);
    }
}
