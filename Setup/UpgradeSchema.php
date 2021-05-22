<?php

namespace AHT\Testimonials\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.0.4', '<')) {
          $installer->getConnection()->addColumn(
                $installer->getTable('aht_customer'),
                'category_depth',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'length' => 10,
                    'nullable' => true,
                    'comment' => 'Category Depth'
                ]
            );
        }
        if (version_compare($context->getVersion(), '1.0.4', '<')) {
            $installer->getConnection()->addColumn(
                  $installer->getTable('aht_testimonials'),
                  'images',
                  [
                      'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                      'length' => 255,
                      'nullable' => false,
                      'comment' => 'Image'
                  ]
              );
          }
        $installer->endSetup();
    }
}
