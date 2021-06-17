define([
    'ko',
    'uiComponent',
    'underscore',
    'Magento_Checkout/js/model/step-navigator',
    'mage/url',
    'mage/storage',
], function (ko, Component, _, stepNavigator, urlBuilder, storage) {
    'use strict';

    /**
     * mystep - is the name of the component's .html template,
     * <Vendor>_<Module>  - is the name of your module directory.
     */
    return Component.extend({
        defaults: {
            template: 'AHT_Delivery/delivery'
        },

        // add here your logic to display step,
        isVisible: ko.observable(true),

        /**
         * @returns {*}
         */
        initialize: function () {
            this._super();

            // register your step
            stepNavigator.registerStep(
                // step code will be used as step content id in the component template
                'delivery_step',
                // step alias
                null,
                // step title value
                'Delivery Step',
                // observable property with logic when display step or hide step
                this.isVisible,

                _.bind(this.navigate, this),

                /**
                 * sort order value
                 * 'sort order value' < 10: step displays before shipping step;
                 * 10 < 'sort order value' < 20 : step displays between shipping and payment step
                 * 'sort order value' > 20 : step displays after payment step
                 */
                15
            );

            return this;
        },

        /**
         * The navigate() method is responsible for navigation between checkout steps
         * during checkout. You can add custom logic, for example some conditions
         * for switching to your custom step
         * When the user navigates to the custom step via url anchor or back button we_must show step manually here
         */
         navigate: function () {

        },

        /**
        * @returns void
        */
        navigateToNextStep: function () {
            var date = document.getElementById('date').value;
            var note = document.getElementById('note').value;
            var serviceUrl = urlBuilder.build('delivery/index/index');
            stepNavigator.next();

            return storage.post(
                serviceUrl,
                JSON.stringify({'date': date, 'note': note}),
                false
            ).done(function (response) {
                console.log(response);
            }
            ).fail(function (response) {
                // code khi fail
                // console.log("không nhận được data");
            });
        }
    });
});