var config = {
    config: {
        mixins: {
            'Magento_SalesRule/js/action/set-coupon-code': {
                'Citytech_CheckoutFix/js/action/set-coupon-code-mixin': true
            },
            'Magento_SalesRule/js/action/cancel-coupon': {
                'Citytech_CheckoutFix/js/action/cancel-coupon-mixin': true
            }
        }
    }
};