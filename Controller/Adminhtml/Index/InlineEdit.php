<?php
namespace AHT\Testimonials\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use AHT\Testimonials\Api\TestimonialsRepositoryInterface as TestimonialsRepository;
use Magento\Framework\Controller\Result\JsonFactory;
use AHT\Testimonials\Api\Data\TestimonialsInterface;

class InlineEdit extends \Magento\Backend\App\Action
{
    protected $testimonialsRepository;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    public function __construct(
        Context $context,
        TestimonialsRepository $testimonialsRepository,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->testimonialsRepository = $testimonialsRepository;
        $this->jsonFactory = $jsonFactory;
    }
    
    /**
     * Authorization level
     *
     * @see _isAllowed()
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('AHT_Testimonials::save');
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /* @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        $testimonialsItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($testimonialsItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($testimonialsItems) as $testimonialsId) {
            $testimonials = $this->testimonialsRepository->getById($testimonialsId);
            try {
                $testimonialsData = $testimonialsItems[$testimonialsId];
                $extendedTestimonialsData = $testimonials->getData();
                $this->setTestimonialsData($testimonials, $extendedTestimonialsData, $testimonialsData);
                $this->testimonialsRepository->save($testimonials);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $messages[] = $this->getErrorWithTestimonialsId($testimonials, $e->getMessage());
                $error = true;
            } catch (\RuntimeException $e) {
                $messages[] = $this->getErrorWithTestimonialsId($testimonials, $e->getMessage());
                $error = true;
            } catch (\Exception $e) {
                $messages[] = $this->getErrorWithTestimonialsId(
                    $testimonials,
                    __('Something went wrong while saving the testimonials.')
                );
                $error = true;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}