<?php

namespace AHT\Testimonials\Api\Data;

interface TestimonialsInterface 
{
    const ID = 'id';

    /**
     * Get testimonials id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set testimonials id
     *
     * @param int $id
     * @return @this
     */
    public function setId($id);

    /**
     * Get testimonials title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set testimonials title
     *
     * @param string $title
     * @return null
     */
    public function setTitle($title);

    /**
     * Get testimonials images
     *
     * @return string|null
     */
    public function getImages();

    /**
     * Set testimonials images
     *
     * @param string $images
     * @return null
     */
    public function setImages($images);

    /**
     * Get testimonials customerid
     *
     * @return int|null
     */
    public function getCustomerid();

    /**
     * Set testimonials customerid
     *
     * @param int $customerid
     * @return @this
     */
    public function setCustomerid($customerid);

    /**
     * Get testimonials designation
     *
     * @return string|null
     */
    public function getDesignation();

    /**
     * Set testimonials designation
     *
     * @param string $designation
     * @return null
     */
    public function setDesignation($designation);

    /**
     * Get testimonials contact
     *
     * @return string|null
     */
    public function getContact();

    /**
     * Set testimonials contact
     *
     * @param string $contact
     * @return null
     */
    public function setContact($contact);

    /**
     * Get testimonials message
     *
     * @return string|null
     */
    public function getMessage();

    /**
     * Set testimonials message
     *
     * @param string $message
     * @return null
     */
    public function setMessage($message);
}