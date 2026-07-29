<?php

namespace Citytech\CategoryWidget\Block\Widget;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Categories extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = 'widget/categories.phtml';

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    public function __construct(
        Template\Context $context,
        CategoryRepositoryInterface $categoryRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->categoryRepository = $categoryRepository;
        $this->urlBuilder = $context->getUrlBuilder();
    }

    /**
     * Return selected categories
     *
     * @return array
     */
    public function getCategories()
    {
        $categories = [];

        $categoryIds = $this->getData('category_ids');

        if (!$categoryIds) {
            return [];
        }

        $categoryIds = explode(',', $categoryIds);

        foreach ($categoryIds as $categoryId) {

            try {

                $category = $this->categoryRepository->get(trim($categoryId));

                if ($category->getIsActive()) {
                    $categories[] = $category;
                }

            } catch (NoSuchEntityException $e) {
                continue;
            }
        }

        return $categories;
    }

	/**
	 * Show Image
	 ***/
	public function canShowImage()
	{
		return (bool) ($this->getData('show_image') ?? 1);
	}

	/**
	 * Show Description
	 */
	public function canShowDescription()
	{
		return (bool) ($this->getData('show_description') ?? 1);
	}
}