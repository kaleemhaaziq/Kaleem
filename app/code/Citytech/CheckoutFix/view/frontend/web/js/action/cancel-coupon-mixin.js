define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/payment-service',
    'Magento_Checkout/js/model/payment/method-list'
], function ($, wrapper, paymentService, methodList) {
    'use strict';

    return function (cancelCouponAction) {
        return wrapper.wrap(cancelCouponAction, function (originalAction, isDelayed) {
            return originalAction(isDelayed).done(function (response) {
                window.location.reload();
                paymentService.setPaymentMethods(methodList());
            });
        });
    };
});