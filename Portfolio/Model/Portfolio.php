<?php
namespace AHT\Portfolio\Model;

// class Portfolio extends AbstractModel implements IdentityInterface
class Portfolio extends \Magento\Framework\Model\AbstractModel {
    const CACHE_TAG = 'aht_portfolio_post';

    protected $_cacheTag = 'aht_portfolio_post';

    protected $_eventPrefix = 'aht_portfolio_post';
    
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
		$this->_init('AHT\Portfolio\Model\ResourceModel\Portfolio');
    }    

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getId()
    {
        return $this->getData('id');
    }
    public function setId($id)
    {
        $this->setData('id', $id);
    }
     
    public function getTitle()
    {
        return $this->getData('title');
    }
    public function setTitle($title)
    {
        $this->setData('title', $title);
    } 

    public function getCategoryid()
    {
        return $this->getData('categoryid');
    }
    public function setCategoryid($categoryid)
    {
        $this->setData('categoryid', $categoryid);
    }

    public function getDescription()
    {
        return $this->getData('description');
    }
    public function setDescription($description)
    {
        $this->setData('description', $description);
    } 

    public function getPrice()
    {
        return $this->getData('price');
    }
    public function setPrice($price)
    {
        $this->setData('price', $price);
    } 

    public function getContent()
    {
        return $this->getData('content');
    }
    public function setContent($content)
    {
        $this->setData('content', $content);
    } 
}
