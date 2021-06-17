<?php
namespace AHT\AttributeCustomer\Block;

class CountryName extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Directory\Model\CountryFactory
     */
    protected $_countryFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Directory\Model\CountryFactory $countryFactory,
        array $data = []
       ) 
       {
        $this->_countryFactory = $countryFactory;
        parent::__construct($context, $data);
       }
        
    public function getCountryName($countryCode)
    {    
        $country = $this->_countryFactory->create()->loadByCode($countryCode);
        return $country->getName();
    }
}
// source: https://magento.stackexchange.com/questions/159494/how-to-get-country-name-from-country-code-in-magento-2
// https://www.hiddentechies.com/blog/magento-2/magento-2-get-country-name-from-country-code/
