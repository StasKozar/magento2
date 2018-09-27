<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/9/18
 * Time: 3:50 PM
 */

namespace Extension\Novaposhta\Controller\Adminhtml\City;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Backend::content';

    /**
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Extension_Novaposhta::novaposhta_city');
        $resultPage->addBreadcrumb(__('Novaposhta'), __('Novaposhta'));
        $resultPage->addBreadcrumb(__('Manage Cities'), __('Manage Cities'));
        $resultPage->getConfig()->getTitle()->prepend(__('Cities'));

        $dataPersistor = $this->_objectManager->get(\Magento\Framework\App\Request\DataPersistorInterface::class);
        $dataPersistor->clear('novaposhta_city');

        return $resultPage;
    }
}
