## Magento 2 testimonial

*Testimonial magento 2 extension** helps you to show list of testimonials on your website. All your vistors will know what others think about your website.

### Installation Steps

1. Copy Directory called `Customer` and paste into `app/code` directory
2. run below commands
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile 
php bin/magento cache:flush
```

### How to use it on frontend?
1. {storeUrl}/testimonials -> This will use to Add testimonials
2. {storeUrl}testimonials/index/view/ -> This will list all testimonials


