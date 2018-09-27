<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/5/18
 * Time: 11:56 AM
 */

namespace Extension\Novaposhta\Api\Data;


interface CityInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const REF = 'ref';
    const CITY_ID = 'city_id';
    const DESCRIPTION = 'description';
    const DESCRIPTION_RU = 'description_ru';
    const UPDATED_AT = 'updated_at';

    /**
     * Get reference.
     *
     * @return string
     */
    public function getRef();

    /**
     * Get city id.
     *
     * @return int
     */
    public function getCityID();

    /**
     * Get city name on russian.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get city name on ukrainian.
     *
     * @return string
     */
    public function getDescriptionRu();

    /**
     * Get updated at.
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     * Set city reference.
     *
     * @param string $ref
     * @return void
     */
    public function setRef($ref);

    /**
     * Set city id.
     *
     * @param int $cityId
     * @return void
     */
    public function setCityID($cityId);

    /**
     * Set city name on russian.
     *
     * @param string $descriptionRu
     * @return void
     */
    public function setDescriptionRu($descriptionRu);

    /**
     * Set city name on ukrainian.
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description);

    /**
     * Set updated at.
     *
     * @param string $updatedAt
     * @return void
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Retrieve existing extension attributes object
     *
     * Null for return is specified for proper work SOAP requests parser
     *
     * @return \Extension\Novaposhta\Api\Data\CityExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object
     *
     * @param \Extension\Novaposhta\Api\Data\CityExtensionInterface|null $extensionAttributes
     * @return void
     */
    public function setExtensionAttributes(CityExtensionInterface $extensionAttributes);
}
