<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/5/18
 * Time: 11:56 AM
 */
namespace Extension\Novaposhta\Api\Data;

interface WarehouseInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const REF = 'ref';
    const SITE_KEY = 'site_key';
    const DESCRIPTION = 'description';
    const DESCRIPTION_RU = 'description_ru';
    const CITY_REF = 'city_ref';
    const CITY_DESCRIPTION = 'city_description';
    const CITY_DESCRIPTION_RU = 'city_description_ru';
    const PHONE = 'phone';
    const WEEKDAY_WORK_HOURS = 'weekday_work_hours';
    const WEEKDAY_RECEIVING_HOURS = 'weekday_receiving_hours';
    const WEEKDAY_DELIVERY_HOURS = 'weekday_delivery_hours';
    const SATURDAY_WORK_HOURS = 'saturday_work_hours';
    const SATURDAY_RECEIVING_HOURS = 'saturday_receiving_hours';
    const SATURDAY_DELIVERY_HOURS = 'saturday_delivery_hours';
    const MAX_WEIGHT_ALLOWED = 'max_weight_allowed';
    const LONGITUDE = 'longitude';
    const LATITUDE ='latitude';
    const NUMBER = 'number';
    const UPDATE_AT = 'updated_at';

    /**
     * Get Reference.
     *
     * @return string
     */
    public function getRef();

    /**
     * Get site key.
     *
     * @return int
     */
    public function getSiteKey();

    /**
     * Get address on ukrainian.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get address on russian.
     *
     * @return string
     */
    public function getDescriptionRu();

    /**
     * Get city reference for current warehouse.
     *
     * @return string
     */
    public function getCityRef();

    /**
     * Get city name on ukrainian.
     *
     * @return string
     */
    public function getCityDescription();

    /**
     * Get city name on russian.
     *
     * @return string
     */
    public function getCityDescriptionRu();

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone();

    /**
     * Get weekday work hours.
     *
     * @return string
     */
    public function getWeekdayWorkHours();

    /**
     * Get weekday receiving hours.
     *
     * @return string
     */
    public function getWeekdayReceivingHours();

    /**
     * Get weekday delivery hours.
     *
     * @return string
     */
    public function getWeekdayDeliveryHours();

    /**
     * Get saturday work hours.
     *
     * @return string|null
     */
    public function getSaturdayWorkHours();

    /**
     * Get saturday receiving hours.
     *
     * @return string
     */
    public function getSaturdayReceivingHours();

    /**
     * Get saturday delivery hours.
     *
     * @return string
     */
    public function getSaturdayDeliveryHours();

    /**
     * Get max weight allowed.
     *
     * @return int
     */
    public function getMaxWeightAllowed();

    /**
     * Get latitude.
     *
     * @return float
     */
    public function getLatitude();

    /**
     * Get longitude.
     *
     * @return float
     */
    public function getLongitude();

    /**
     * Get warehouse number.
     *
     * @return int
     */
    public function getNumber();

    /**
     * Get updated at.
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     * Set reference.
     *
     * @param int $ref
     * @return void
     */
    public function setRef($ref);

    /**
     * Set site key.
     *
     * @param int $siteKey
     * @return void
     */
    public function setSiteKey($siteKey);

    /**
     * Set warehouse description on ukrainian.
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description);

    /**
     * Set warehouse description on russian.
     *
     * @param string $descriptionRu
     * @return void
     */
    public function setDescriptionRu($descriptionRu);

    /**
     * Set city reference for current warehouse.
     *
     * @param string $cityRef
     * @return void
     */
    public function setCityRef($cityRef);

    /**
     * Set city name on ukrainian.
     *
     * @param string $cityDescription
     * @return void
     */
    public function setCityDescription($cityDescription);

    /**
     * Set city name on russian.
     *
     * @param string $cityDescriptionRu
     * @return void
     */
    public function setCityDescriptionRu($cityDescriptionRu);

    /**
     * Set phone.
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone);

    /**
     * Set weekday work hours.
     *
     * @param string $weekdayWorkHours
     * @return void
     */
    public function setWeekdayWorkHours($weekdayWorkHours);

    /**
     * Set weekday receiving hours.
     *
     * @param string $weekdayReceivingHours
     * @return void
     */
    public function setWeekdayReceivingHours($weekdayReceivingHours);

    /**
     * Set weekday delivery hours.
     *
     * @param string $weekdayDeliveryHours
     * @return void
     */
    public function setWeekdayDeliveryHours($weekdayDeliveryHours);

    /**
     * Set saturday work hours.
     *
     * @param string $saturdayWorkHours
     * @return void
     */
    public function setSaturdayWorkHours($saturdayWorkHours);

    /**
     * Set saturday receiving hours.
     *
     * @param string $saturdayReceivingHours
     * @return void
     */
    public function setSaturdayReceivingHours($saturdayReceivingHours);

    /**
     * Set saturday delivery hours.
     *
     * @param string $saturdayDeliveryHours
     * @return void
     */
    public function setSaturdayDeliveryHours($saturdayDeliveryHours);

    /**
     * Set max weight allowed.
     *
     * @param int $maxWeightAllowed
     * @return void
     */
    public function setMaxWeightAllowed($maxWeightAllowed);

    /**
     * Set longitude.
     *
     * @param float $longitude
     * @return void
     */
    public function setLongitude($longitude);

    /**
     * Set latitude.
     *
     * @param float $latitude
     * @return void
     */
    public function setLatitude($latitude);

    /**
     * Set warehouse number.
     *
     * @param int $number
     * @return void
     */
    public function setNumber($number);

    /**
     * Set updated at.
     *
     * @param string $updatedAt
     * @return void
     */
    public function setUpdateAt($updatedAt);
}
