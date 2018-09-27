<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 2/28/18
 * Time: 2:12 PM
 */

namespace Extension\Novaposhta\Controller\Adminhtml\Warehouse;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\HTTP\ZendClientFactory;
use Magento\Framework\HTTP\ZendClient;

class SyncProcessor
{
    const MODEL_NAME = 'Address';
    const METHOD_NAME = 'getWarehouses';

    /**
     * @var $clientFactory ZendClientFactory
     */
    private $clientFactory;

    /**
     * @var $scopeConfig ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ZendClientFactory $clientFactory,
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->clientFactory = $clientFactory;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return array
     */
    public function process(): array
    {
        $requestData = json_encode([
            'modelName' => self::MODEL_NAME,
            'calledMethod' => self::METHOD_NAME,
            'apiKey' => $this->scopeConfig->getValue('carriers/novaposhta/api_key'),
        ]);

        $response = $this->getWarehousesFromApiService($requestData);

        return $response['success'] ? $response['data'] : [];
    }

    /**
     * @param string $request
     * @return array
     */
    private function getWarehousesFromApiService(string $request): array
    {
        /** @var ZendClient $client */
        $client = $this->clientFactory->create();
        $client->setUri((string)$this->scopeConfig->getValue('carriers/novaposhta/api_url'));
        $client->setConfig(['maxredirects' => 0, 'timeout' => 30]);
        $client->setHeaders('Content-Type: application/json');
        $client->setRawData($request);

        return json_decode($client->request(ZendClient::POST)->getBody(), true);
    }
}
