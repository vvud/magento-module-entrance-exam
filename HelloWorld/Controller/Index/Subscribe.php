<?php
namespace AHT\HelloWorld\Controller\Index;
use AHT\HelloWorld\Model\ResourceModel\Subscription as ResourceModel;
use AHT\HelloWorld\Model\SubscriptionFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Subscribe extends Action {
    protected $_resourceModel;
    protected $_subscriptionFactory;
    public function __construct(
        ResourceModel $resourceModel,
        Context $context,
        SubscriptionFactory $subscriptionFactory
    ){
        $this->_resourceModel = $resourceModel;
        $this->_subscriptionFactory = $subscriptionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $model = $this->_subscriptionFactory->create();
        $data = [
            'firstname' => 'John',
            'lastname'  => 'Doe',
            'email'     => 'john.doe@example.com',
            'message'   =>  'A short message to test'
        ];
        $model->addData($data);
        $this->_resourceModel->save($model);
        $this->getResponse()->setBody('success');
    }
}
