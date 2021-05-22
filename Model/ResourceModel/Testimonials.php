<?php

namespace AHT\Testimonials\Model\ResourceModel;

class Testimonials extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	) {
		parent::__construct($context);
	}

	// Main table and primary key
	protected function _construct() {
		$this->_init('aht_testimonials', 'id');
	}
}