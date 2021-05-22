<?php
namespace AHT\Testimonials\Model;

use AHT\Testimonials\Api\Data;
use AHT\Testimonials\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use AHT\Testimonials\Model\ResourceModel\Customer as ResourceTestimonials;
use AHT\Testimonials\Model\ResourceModel\Customer\CollectionFactory as CustomerCollectionFactory;

/**
 * Class TestimonialsRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var ResourceTestimonials
     */
    protected $resource;

    /**
     * @var TestimonialsFactory
     */
    protected $TestimonialsFactory;

    /**
     * @var TestimonialsCollectionFactory
     */
    protected $customerCollectionFactory;

    /**
     * @var Data\TestimonialsSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourceTestimonials $resource
     * @param TestimonialsFactory $TestimonialsFactory
     * @param Data\TestimonialsInterfaceFactory $dataTestimonialsFactory
     * @param TestimonialsCollectionFactory $TestimonialsCollectionFactory
     * @param Data\TestimonialsSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceTestimonials $resource,
        CustomerFactory $TestimonialsFactory,
        // Data\TestimonialsInterfaceFactory $dataTestimonialsFactory,
        CustomerCollectionFactory $customerCollectionFactory
    ) {
        $this->resource = $resource;
        $this->TestimonialsFactory = $TestimonialsFactory;
        $this->customerCollectionFactory = $customerCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Testimonials data
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Testimonials
     * @return Testimonials
     * @throws CouldNotSaveException
     */
    public function save(\AHT\Testimonials\Api\Data\CustomerInterface $testimonials)
    {

        try {
            $this->resource->save($testimonials);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Customer: %1', $exception->getMessage()),
                $exception
            );
        }
        return $testimonials;
    }

    /**
     * Load Testimonials data by given Testimonials Identity
     *
     * @param string $TestimonialsId
     * @return Testimonials
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($testimonialsId)
    {
        $testimonials = $this->TestimonialsFactory->create();
        $testimonials->load($testimonialsId);
        if (!$testimonials->getId()) {
            throw new NoSuchEntityException(__('The CMS Customer with the "%1" ID doesn\'t exist.', $testimonialsId));
        }
        return $testimonials;
    }

    /**
     * Load Testimonials data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \AHT\Testimonials\Api\Data\TestimonialsSearchResultsInterface
     */
    public function getList()
    {
        /** @var \AHT\Testimonials\Model\ResourceModel\Testimonials\Collection $collection */
        $collection = $this->TestimonialsCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete Testimonials
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Testimonials
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\AHT\Testimonials\Api\Data\CustomerInterface $testimonials)
    {
        try {
            $this->resource->delete($testimonials);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Customer: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Testimonials by given Testimonials Identity
     *
     * @param string $testimonialsId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($testimonialsId)
    {
        return $this->delete($this->getById($testimonialsId));
    }
}