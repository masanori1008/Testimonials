<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AHT\Testimonials\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Edit CMS block action.
 */
class Edit extends \AHT\Testimonials\Controller\Adminhtml\Testimonials implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $testimonialsFactory;
    protected $testimonialsResourceFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \AHT\Testimonials\Model\TestimonialsFactory $testimonialsFactory,
        \AHT\Testimonials\Model\ResourceModel\TestimonialsFactory $testimonialsResourceFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->testimonialsFactory = $testimonialsFactory;
        $this->testimonialsResourceFactory = $testimonialsResourceFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit CMS block
     *
     * @return \Magento\Framework\Controller\ResultInterface
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $model = $this->testimonialsFactory->create();
        $modelResource = $this->testimonialsResourceFactory->create();

        // 2. Initial checking
        if ($id) {
            $modelResource->load($model,$id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This block no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('testimonials', $model);

        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit testimonials') : __('New testimonials'),
            $id ? __('Edit testimonials') : __('New testimonials')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('testimonials'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New testimonials'));

        return $resultPage;
    }
}