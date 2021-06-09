<?php
namespace AHT\HelloWorld\Model;
class Subscription extends \Magento\Framework\Model\AbstractModel {
    constSTATUS_PENDING = 'pending';
    constSTATUS_APPROVED = 'approved';
    constSTATUS_DECLINED = 'declined';
    public function __construct(
   	 \Magento\Framework\Model\Context $context,
   	 \Magento\Framework\Registry $registry,
   	 \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
   	 null,
   	 \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
   	 null,
   	 array $data = []
    ) {
   	 parent::__construct($context, $registry, $resource,$resourceCollection, $data);
    }
    public function _construct() {
   	 $this->_init('AHT\HelloWorld\Model\ResourceModel\Subscription');
    }
}
