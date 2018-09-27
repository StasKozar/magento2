<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/26/18
 * Time: 2:36 PM
 */

namespace Extension\Novaposhta\Model\Warehouse\Command;

use Magento\Framework\HTTP\ClientFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;

class SyncService implements SyncServiceInterface
{

    /**
     * @var ClientFactory
     */
    private $clientFactory;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ClientFactory $clientFactory,
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->clientFactory = $clientFactory;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $data = [];
        $apiKey = $this->scopeConfig->getValue('carriers/novaposhta/api_key');
        $uri = $this->scopeConfig->getValue('carriers/novaposhta/api_url');
        $requestData = json_encode([
            'modelName' => self::MODEL_NAME,
            'calledMethod' => self::METHOD_NAME,
            $apiKey
        ]);

        $client = $this->clientFactory->create();
        $client->setUri($uri);
        $client->setConfig(['timeout' => CURLOPT_TIMEOUT]);
        $client->setHeaders(['Content-Type: application/json']);
        $client->setMethod(\Zend_Http_Client::POST);
        $client->setRawData($requestData);
        try {
            $responseBody = json_decode($client->reqeust()->getBody());
        } catch (\Exception $e) {
            throw new LocalizedException(__('Unable to get data from service.'));
        }

        return $data;
    }
}