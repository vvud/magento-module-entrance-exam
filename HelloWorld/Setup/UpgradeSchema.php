<?php
namespace AHT\HelloWorld\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface {
    public function upgrade(
   	 SchemaSetupInterface $setup,
   	 ModuleContextInterface $context
    ) {
   	 if (version_compare($context->getVersion(), '2.0.1') < 0) {
   		 $installer = $setup;
   		 $installer->startSetup();
   		 $connection = $installer->getConnection();
   		 //Install new database table
   		 $table = $installer->getConnection()->newTable($installer->getTable('AHT_helloworld_subscription'))
   		 ->addColumn(
   			 'subscription_id',
   			 \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
   			 null,[
   				 'identity' => true,
   				 'unsigned' => true,
   				 'nullable' => false,
   				 'primary' => true
   			 ],
   			 'Subscription Id'
   		 )->addColumn(
   			 'created_at',
   			 \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
   			 null,[
   				 'nullable' => false,
   				 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT
   			 ],
   			 'Created at'
   		 )->addColumn(
   			 'updated_at',
   			 \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
   			 null,
   			 [],
   			 'Updated at'
   		 )->addColumn(
   			 'firstname',
   			 \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
   			 64,
   			 ['nullable' => false],
   			 'First name'
   		 )->addColumn(
   			 'lastname',
   			 \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
   			 64,
   			 ['nullable' => false],
   			 'Last name'
   		 )->addColumn(
   		 'email',
   			 \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
   			 255,
   			 ['nullable' => false],
   			 'Email address'
   		 )->addColumn(
   		 'status',
   			 \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
   			 255,[
   				 'nullable' => false,
   				 'default' => 'pending',
   			 ],
   			 'Status'
   		 )->addColumn(
   			 'message',
   			 \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
   			 '64k',[
   				 'unsigned' => true,
   				 'nullable' => false
   			 ],
   			 'Subscription notes'
   		 )->addIndex(
   			 $installer->getIdxName('aht_helloworld_subscription', ['email']),
   			 ['email']
   		 )->setComment(
   			 'Cron Schedule'
   		 );
   		 $installer->getConnection()->createTable($table);
   		 $installer->endSetup();
   	 }
    }
}
