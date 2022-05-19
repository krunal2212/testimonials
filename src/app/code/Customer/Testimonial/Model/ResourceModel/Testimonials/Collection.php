<?php

namespace Customer\Testimonial\Model\ResourceModel\Testimonials;

use Customer\Testimonial\Model\ResourceModel\Testimonials;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Customer\Testimonial\Model\Testimonials::Class,
            Testimonials::Class
        );
    }
}
