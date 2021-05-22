<?php
namespace AHT\Testimonials\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface TestimonialsRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Post
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\AHT\Testimonials\Api\Data\TestimonialsInterface $Post);

    /**
     * Retrieve Post.
     *
     * @param int $PostId
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getTestimonialsById($PostId);

    /**
     * Retrieve Posts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AHT\Testimonials\Api\Data\PostSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Get List
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Post
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList();

    /**
     * Delete Post.
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Post
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\AHT\Testimonials\Api\Data\TestimonialsInterface $Post);

    /**
     * Delete Post by ID.
     *
     * @param int $PostId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($PostId);

    /**
     * Create post.
     *
     * @param \AHT\Portfolio\Api\Data\PortfolioInterface $post
     * 
     * @return \AHT\Portfolio\Api\Data\PortfolioInterface
     */
    public function createPost(\AHT\Testimonials\Api\Data\TestimonialsInterface $post);

    /**
     * Update post
     *
     * @param String $id
     * @param \AHT\Blog\Api\Data\PostInterface $post
     * 
     * @return null
     */
    public function updatePost(String $id, \AHT\Testimonials\Api\Data\TestimonialsInterface $post);
}
