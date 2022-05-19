<?php

namespace Customer\Testimonial\Block;

use Customer\Testimonial\Model\Testimonials;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Testimonialslist extends Template
{

    /**
     * @var Testimonials
     */
    protected $testimonials;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    /**
     * @var Session
     */
    protected $customerSession;
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param Context      $context
     * @param Testimonials $testimonialsFactory
     * @param Session      $customerSession
     * @param array        $data
     */
    public function __construct(
        Context $context,
        Testimonials $testimonialsFactory,
        Session $customerSession,
        array $data = []
    ) {
        $this->testimonials = $testimonialsFactory;
        $this->_storeManager = $context->getStoreManager();
        $this->urlBuilder = $context->getUrlBuilder();
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    /**
     * @return \Magento\Framework\Data\Collection\AbstractDb|\Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection|null
     */
    public function sidebarCollection()
    {
        $collection = $this->testimonials->getCollection();
        $collection->addFieldToFilter('status', 1);
        $collection->setOrder('testimonial_id', 'DESC');
        return $collection;
    }

    /**
     * @return $this|Testimonialslist
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        return $this;
    }

}
