<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Customer\Testimonial\Controller\Index;

class Submit extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;
    /**
     * @var \Customer\Testimonial\Model\Testimonials
     */
    protected $testimonials;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $scopeConfig;
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @param \Magento\Framework\App\Action\Context      $context
     * @param \Customer\Testimonial\Model\Testimonials   $testimonials
     * @param \Magento\Store\Model\StoreManagerInterface $scopeConfig
     * @param \Magento\Customer\Model\Session            $customerSession
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Customer\Testimonial\Model\Testimonials $testimonials,
        \Magento\Store\Model\StoreManagerInterface $scopeConfig,
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->_objectManager = $context->getObjectManager();
        $this->testimonials = $testimonials;
        $this->scopeConfig = $scopeConfig;
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        try {
            $post = $this->getRequest()->getPostValue();
            if ($post) {
                $model = $this->testimonials;
                $model->setData($post);
                $model->setData('status', 1);
                $storeConfig = $this->scopeConfig;
                $store = $storeConfig->getStore();
                $storeId = $store->getData('store_id');
                if (!empty($this->customerSession->getCustomer()->getId())) {
                    $model->setData('customer_id', $this->customerSession->getCustomer()->getId());
                }
                $model->setData('storeId', $storeId);
                $model->save();
                $this->_redirect('testimonials/index/view');

                $this->messageManager->addSuccess(__('Testimonials details have been inserted successfully.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }
}
