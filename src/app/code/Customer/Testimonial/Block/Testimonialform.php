<?php

namespace Customer\Testimonial\Block;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;

class Testimonialform extends Template
{

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * @param Template\Context $context
     * @param Session          $customerSession
     * @param array            $data
     */
    public function __construct(
        Template\Context $context,
        Session $customerSession,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
        $this->customerSession = $customerSession;
    }

    /**
     * @return array|mixed|string[]|null
     */
    public function getcustomerSessionData()
    {
        if ($this->customerSession->isLoggedIn()) {
            return $this->customerSession->getCustomer()->getData();
        }
        return ['firstname' => '', 'email' => '', 'entity_id' => ''];
    }
}
