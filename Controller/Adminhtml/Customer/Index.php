<?php 

namespace AHT\Testimonials\Controller\Adminhtml\Customer;

class Index extends \Magento\Backend\App\Action {

    protected $pageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     *
     * @return $tempPage
     */
    public function execute()
    {
       $tempPage = $this->pageFactory->create();
       $tempPage->getConfig()->getTitle()->prepend(__('Customer'));
       return $tempPage;
    }
}