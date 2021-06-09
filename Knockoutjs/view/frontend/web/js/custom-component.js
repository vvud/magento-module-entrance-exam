define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
    'use strict';
    return Component.extend({
        defaults: {
            template: 'AHT_Knockoutjs/knockout-test'
        },
        initialize: function () {
            this.customerName = ko.observableArray([]);
            this.customerData = ko.observable('');
            this._super();
        },

        addNewCustomer: function () {
            this.customerName.push({name:this.customerData()});
            this.customerData('');
        }
    });
}
);
