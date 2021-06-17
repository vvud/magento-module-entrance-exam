<?php
 
namespace AHT\Delivery\Controller\Index;
 
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @param \Magento\Checkout\Model\Session
     */
    protected $_checkoutSession;
    
    protected $json;
 
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Serialize\Serializer\Json $json
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_checkoutSession = $checkoutSession;
        $this->json = $json;
        return parent::__construct($context);
    }

    public function execute()
    {
        // get data from ajax
        $data = $this->getRequest()->getContent();
        $response = $this->json->unserialize($data);

        $date = $response['date'];
        $note = $response['note'];
        
        // assign value
        $this->setDate($date);
        $this->setNote($note);

        // var_dump($response);
        // die;
        
        // $resultJson = $this->resultJsonFactory->create();
        // var_dump($response);
         // chuyển kết quả về dạng object json và trả về cho ajax
        // return $resultJson->setData($response);
        // return;
    }

    public function setDate($date) {
        $this->_checkoutSession->setDate($date);
    }

    public function setNote($note) {
        $this->_checkoutSession->setNote($note);
    }
}
