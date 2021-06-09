<?php
namespace AHT\HelloWorld\Model\ResourceModel\Subscription;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public function _construct() {
   	 $this->_init('AHT\HelloWorld\Model\Subscription', 'AHT\HelloWorld\Model\ResourceModel\Subscription');
    }
}
