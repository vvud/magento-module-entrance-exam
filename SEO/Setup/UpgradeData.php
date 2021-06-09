<?php
namespace AHT\SEO\Setup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class UpgradeData implements UpgradeDataInterface {
    protected $resourceConfig;
    public function __construct(\Magento\Config\Model\ResourceModel\Config $resourceConfig)
    {
   	 $this->resourceConfig = $resourceConfig;
    }
    public function upgrade(
   	 ModuleDataSetupInterface $setup,
   	 ModuleContextInterface $context
    ) {
   	 if (version_compare($context->getVersion(), '2.0.1') < 0) {
   		 $this->resourceConfig->saveConfig(
   		 'web/cookie/cookie_lifetime',
   		 '7200',
   		 \Magento\Config\Block\System\Config\Form::SCOPE_DEFAULT,
   		 0
   		 );
   	 }
    }
}
