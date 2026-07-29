define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/payment-service',
    'Magento_Checkout/js/model/payment/method-list'
], function ($, wrapper, paymentService, methodList) {
    'use strict';

    return function (setCouponCodeAction) {
        return wrapper.wrap(setCouponCodeAction, function (originalAction, couponCode, isDelayed) {
            return originalAction(couponCode, isDelayed).done(function (response) {
                // Read the fresh list that came back in your network payload
                window.location.reload();
                var deferred = $.Deferred();
                // Force KnockoutJS to notify subscribers that payment methods are available
                paymentService.setPaymentMethods(methodList());
            });
        });
    };
});