<?php 

namespace AHT\Portfolio\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AHT_Portfolio:portfolio');
        $resultPage->addBreadcrumb(__('Portfolio'), __('Portfolio'));
        $resultPage->addBreadcrumb(__('Manage Portfolio'), __('Manage Portfolio'));
        $resultPage->getConfig()->getTitle()->prepend(__('Portfolio'));
        return $resultPage;
    } 
}