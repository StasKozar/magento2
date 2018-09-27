<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/5/18
 * Time: 10:20 AM
 */

namespace Extension\Novaposhta\Model;


use Extension\Novaposhta\Api\Data\WarehouseInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class Warehouse extends AbstractExtensibleModel implements WarehouseInterface
{
    /**
     * @inheritdoc
     */
    public function _construct()
    {
        $this->_init(\Extension\Novaposhta\Model\ResourceModel\Warehouse::class);
    }

    /**
     * @inheritdoc
     */
    public function getRef()
    {
        return $this->getData(self::REF);
    }

    /**
     * @inheritdoc
     */
    public function getSiteKey()
    {
        return $this->getData(self::SITE_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritdoc
     */
    public function getDescriptionRu()
    {
        return $this->getData(self::DESCRIPTION_RU);
    }

    /**
     * @inheritdoc
     */
    public function getCityRef()
    {
        return $this->getData(self::CITY_REF);
    }

    /**
     * @inheritdoc
     */
    public function getCityDescription()
    {
        return $this->getData(self::CITY_DESCRIPTION);
    }

    /**
     * @inheritdoc
     */
    public function getCityDescriptionRu()
    {
        return $this->getData(self::CITY_DESCRIPTION_RU);
    }


    /**
     * @inheritdoc
     */
    public function getPhone()
    {
        return $this->getData(self::PHONE);
    }

    /**
     * @inheritdoc
     */
    public function getWeekdayWorkHours()
    {
        return $this->getData(self::WEEKDAY_WORK_HOURS);
    }

    /**
     * @inheritdoc
     */
    public function getWeekdayReceivingHours()
    {
        return $this->getData(self::WEEKDAY_RECEIVING_HOURS);
    }

    /**
     * @inheritdoc
     */
    public function getWeekdayDeliveryHours()
    {
        return $this->getData(self::WEEKDAY_RECEIVING_HOURS);
    }

    /**
     * @inheritdoc
     */
    public function getSaturdayWorkHours()
    {
        return $this->getData(self::SATURDAY_WORK_HOURS);
    }

    /**
     * @inheritdoc
     */
    public function getSaturdayReceivingHours()
    {
        return $this->getData(self::SATURDAY_RECEIVING_HOURS);
    }

    /**
     * @inheritdoc
     */
    public function getSaturdayDeliveryHours()
    {
        return $this->getData(self::SATURDAY_DELIVERY_HOURS);
    }

    /**
     * @inheritdoc
     */
    public function getMaxWeightAllowed()
    {
        return $this->getData(self::MAX_WEIGHT_ALLOWED);
    }

    /**
     * @inheritdoc
     */
    public function getLatitude()
    {
        return $this->getData(self::LATITUDE);
    }

    /**
     * @inheritdoc
     */
    public function getLongitude()
    {
        return $this->getData(self::LONGITUDE);
    }

    /**
     * @inheritdoc
     */
    public function getNumber()
    {
        return $this->getData(self::NUMBER);
    }

    /**
     * @inheritdoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATE_AT);
    }

    /**
     * @inheritdoc
     */
    public function setPhone($phone)
    {
        $this->setData(self::PHONE, $phone);
    }

    /**
     * @inheritdoc
     */
    public function setWeekdayWorkHours($weekdayWorkHours)
    {
        $this->setData(self::WEEKDAY_WORK_HOURS, $weekdayWorkHours);
    }

    /**
     * @inheritdoc
     */
    public function setWeekdayReceivingHours($weekdayReceivingHours)
    {
        $this->setData(self::WEEKDAY_RECEIVING_HOURS, $weekdayReceivingHours);
    }

    /**
     * @inheritdoc
     */
    public function setWeekdayDeliveryHours($weekdayDeliveryHours)
    {
        $this->setData(self::WEEKDAY_DELIVERY_HOURS, $weekdayDeliveryHours);
    }

    /**
     * @inheritdoc
     */
    public function setSaturdayWorkHours($saturdayWorkHours)
    {
        $this->setData(self::SATURDAY_WORK_HOURS, $saturdayWorkHours);
    }

    /**
     * @inheritdoc
     */
    public function setSaturdayReceivingHours($saturdayReceivingHours)
    {
        $this->setData(self::SATURDAY_RECEIVING_HOURS, $saturdayReceivingHours);
    }

    /**
     * @inheritdoc
     */
    public function setSaturdayDeliveryHours($saturdayDeliveryHours)
    {
        $this->setData(self::SATURDAY_DELIVERY_HOURS, $saturdayDeliveryHours);
    }

    /**
     * @inheritdoc
     */
    public function setMaxWeightAllowed($maxWeightAllowed)
    {
        $this->setData(self::MAX_WEIGHT_ALLOWED, $maxWeightAllowed);
    }

    /**
     * @inheritdoc
     */
    public function setLongitude($longitude)
    {
        $this->setData(self::LONGITUDE, $longitude);
    }

    /**
     * @inheritdoc
     */
    public function setLatitude($latitude)
    {
        $this->setData(self::LATITUDE, $latitude);
    }

    /**
     * @inheritdoc
     */
    public function setUpdateAt($updatedAt)
    {
        $this->setData(self::UPDATE_AT, $updatedAt);
    }

    /**
     * @inheritdoc
     */
    public function setRef($ref)
    {
        $this->setData(self::REF, $ref);
    }

    /**
     * @inheritdoc
     */
    public function setSiteKey($siteKey)
    {
        $this->setData(self::SITE_KEY, $siteKey);
    }

    /**
     * @inheritdoc
     */
    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritdoc
     */
    public function setDescriptionRu($descriptionRu)
    {
        $this->setData(self::DESCRIPTION_RU, $descriptionRu);
    }

    /**
     * @inheritdoc
     */
    public function setCityRef($cityRef)
    {
        $this->setData(self::CITY_REF, $cityRef);
    }

    /**
     * @inheritdoc
     */
    public function setCityDescription($cityDescription)
    {
        $this->setData(self::CITY_DESCRIPTION, $cityDescription);
    }

    /**
     * @inheritdoc
     */
    public function setCityDescriptionRu($cityDescriptionRu)
    {
        $this->setData(self::CITY_DESCRIPTION_RU, $cityDescriptionRu);
    }

    /**
     * @inheritdoc
     */
    public function setNumber($number)
    {
        $this->setData(self::NUMBER, $number);
    }
}