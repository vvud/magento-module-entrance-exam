<?php
namespace AHT\HelloWorld\Block;
use Magento\Framework\View\Element\Template;
class Landingspage extends Template
{
    public function getLandingsUrl()
    {
   	 return $this->getUrl('helloworld');
    }
    public function getRedirectUrl()
    {
   	 return $this->getUrl('helloworld/index/redirect');
    }
}