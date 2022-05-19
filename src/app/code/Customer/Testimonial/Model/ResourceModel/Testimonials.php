<?php
namespace Customer\Testimonial\Model\ResourceModel;

class Testimonials extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('customer_testimonicals', 'testimonial_id');
    }

}
