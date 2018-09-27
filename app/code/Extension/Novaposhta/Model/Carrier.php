<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/4/18
 * Time: 2:44 PM
 */

namespace Extension\Novaposhta\Model;

use Magento\Framework\App\ObjectManager;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Carrier extends AbstractCarrier implements CarrierInterface
{
    /**
     * @var string
     */
    protected $_code = 'novaposhta';

    /**
     * @var Magento\Framework\Serialize\Serializer\Json
     */
    private $serializer;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        array $data = [],
        \Magento\Framework\Serialize\Serializer\Json $serializer = null
    ) {
        $this->serializer = $serializer ?: ObjectManager::getInstance()->get(Json::class);
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return ['example' => $this->getConfigData('name')];
    }

    /**
     * @param RateRequest $request
     * @return bool|Result
     */
    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }

        /** @var \Magento\Shipping\Model\Rate\Result $result */
        $result = $this->_rateResultFactory->create();

        /** @var \Magento\Quote\Model\Quote\Address\RateResult\Method $method */
        $method = $this->_rateMethodFactory->create();

        /*you can fetch shipping price from different sources over some APIs, we used price from config.xml - xml node price*/
        $amount = $this->getDeliveryPriceByWeight($request->getPackageWeight());

        $warehouseId = 1; // dummy warehouse ID
        $warehouseName = 'Склад №1'; // dummy warehouse name

        $method->setCarrier($this->_code)
            ->setCarrierTitle($this->getConfigData('title'))
            ->setMethod('warehouse_' . $warehouseId)
            ->setMethodTitle($warehouseName)
            ->setPrice($amount)
            ->setCost($amount);

        $result->append($method);

        return $result;
    }

    public function isTrackingAvailable(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    private function getWeightPriceMap(): array
    {
        $weightPriceMap = $this->getConfigData('weight_price');
        if (count($weightPriceMap) === 0) {
            return array();
        }

        return $this->serializer->unserialize($weightPriceMap);
    }

    /**
     * @param float $packageWeight
     *
     * @return float
     */
    private function getDeliveryPriceByWeight(float $packageWeight): float
    {
        $weightPriceMap = $this->getWeightPriceMap();
        $resultingPrice = 0.00;
        if (null === $weightPriceMap) {
            return $resultingPrice;
        }

        $minimumWeight = 1000000000;
        foreach ($weightPriceMap as $weightPrice) {
            if ($packageWeight <= $weightPrice['weight'] && $weightPrice['weight'] <= $minimumWeight) {
                $minimumWeight = $weightPrice['weight'];
                $resultingPrice = $weightPrice['price'];
            }
        }

        return $resultingPrice;
    }
}
