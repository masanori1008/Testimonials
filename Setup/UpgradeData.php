<?php
namespace AHT\Testimonials\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface {
	protected $_postFactory;

	public function __construct(\AHT\Testimonials\Model\TestimonialsFactory $postFactory) {
		$this->_postFactory = $postFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
		if (version_compare($context->getVersion(), '1.0.4', '<')) {
			$data = [
				'name' => "Magento 2 Events"
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}
	}
}