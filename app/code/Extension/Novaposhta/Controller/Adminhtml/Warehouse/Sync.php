<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/16/18
 * Time: 10:43 AM
 */

namespace Extension\Novaposhta\Controller\Adminhtml\Warehouse;

use Magento\Backend\App\Action\Context;

class Sync extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Backend::content';

    /**
     * @var SyncProcessor
     */
    private $syncProcessor;

    /**
     * @var SaveProcessor
     */
    private $saveProcessor;

    public function __construct(
        Context $context,
        SyncProcessor $syncProcessor,
        SaveProcessor $saveProcessor
    ) {
        parent::__construct($context);
        $this->syncProcessor = $syncProcessor;
        $this->saveProcessor = $saveProcessor;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        try {
            $data = $this->syncProcessor->process();
            $this->saveProcessor->process($data);
            $this->messageManager->addSuccessMessage('Successfully synchronized');
        } catch (\Zend_Http_Client_Exception $zendException) {
            $this->messageManager->addErrorMessage(__('Could get data from API service'));
        } catch (CouldNotSaveException $couldNotSaveException) {
            $this->messageManager->addErrorMessage(__('Could not Save Warehouse'));
        }

        return $resultRedirect->setPath('*/*/index');
    }
}
