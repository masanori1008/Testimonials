<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AHT\Testimonials\Block\Frontend;

class Edit extends \Magento\Framework\View\Element\Template
{
    protected $_pageFactory;
    protected $_coreRegistry;
    protected $_blogFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Registry $coreRegistry,
        \AHT\Testimonials\Model\TestimonialsFactory $blogFactory,
        array $data = []
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_blogFactory = $blogFactory;
        return parent::__construct($context,$data);
    }

    /**
     * Execute
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }

    /**
     * Get By Id
     *
     * @return $result
     */
    public function getById()
    {
        $id = $this->_coreRegistry->registry('id');
        $blog = $this->_blogFactory->create();
        $result = $blog->load($id);
        $result = $result->getData();
        return $result;
    }
}