define([
    'ko',
    'jquery',
    'uiComponent',
    'mage/url',
    'mage/storage',
    'Magento_Customer/js/customer-data',
    'Magento_Catalog/js/price-utils'
],
function (ko, $, Component, urlBuilder, storage, customerData, priceUtils) {
    'use strict';

    function getFormattedPrice (price) {
        var priceFormat = {
            decimalSymbol: '.',
            groupLength: 3,
            groupSymbol: ".",
            integerRequired: false,
            precision: 2,
            requiredPrecision: 2
        };
            return priceUtils.formatPrice(price, priceFormat);
        }

    function product(item, symbol) {
        item.getPrice = function () {
            return item.price;
        }
        item.symbol = symbol;

        return item;

    }

    function productList(item, symbol) {
        var self = this;
        self.symbol = symbol;
        self.product = ko.observable(product(item, symbol))
        self.qty = ko.observable(1);
        self.qtyUp = function () {
            self.qty(self.qty() + 1);
        };
        self.qtyDown = function () {
            if (self.qty() > 1) {
                self.qty(self.qty() - 1);
            }
        };
        self.sku = ko.observable(item.sku);
        self.getId = item.entity_id;
        self.total = ko.computed(function () {
            return self.qty() * self.product().getPrice();
        });
    }

    function viewModel() {
        var self = this;
        self.isSelected = ko.observable(false);
        self.search = ko.observable();
        self.productList = ko.observableArray([]);
        self.result_search = ko.observableArray([]);
        self.symbol = ko.observable();
        self.result_search_has_focus = ko.observable(true);
        self.result_search_focus = ko.observable(true);
        self.result_search_focus_listener = ko.computed(function () {
            if (self.isSelected()) {
                self.result_search_has_focus(true);
            } else {
                self.result_search_has_focus(self.result_search_focus());
            }

        })
        self.evenSearch = function () {
            var self = this;
            var serviceUrl = urlBuilder.build('knockoutjs/index/search');

            var result = storage.post(
                serviceUrl,
                JSON.stringify({ 'search': self.search() }),
                false
            ).done(
                function (response) {
                    var product = $.map(response.data, function (item) {
                        item['isCheck'] = ko.observable(self.checkExistsInTable(item));
                        return item;
                    })
                    self.symbol(response.symbol);
                    self.result_search(product)
                }

            ).fail(
            );
        };

        self.countLine = ko.computed(function () {
            return self.productList().length;
        })

        self.countQty = ko.computed(function () {
            var totalQty = 0;
            ko.utils.arrayFilter(self.productList(), function (product) {
                totalQty = totalQty + product.qty(); console.log(totalQty);
            });
            return totalQty;
        })

        self.subTotal = ko.computed(function () {
            var total = 0;
            ko.utils.arrayFilter(self.productList(), function (product) {
                total += product.total();
            });
            return getFormattedPrice(total);
        })

        self.checkExistsInTable = function (item) {
            var exist = false;
            var idProducSearch = item.entity_id;
            ko.utils.arrayFilter(self.productList(), function (product) {
                if (product.getId == idProducSearch) {
                    exist = true;
                }
            });
            return exist;
        }
        self.delete = function (item) {
            self.productList.remove(item);
            ko.utils.arrayFilter(self.result_search(), function (product) {
                if (product.entity_id == item.getId) {
                    product.isCheck(false);
                }
            });
        }
        self.check = function (item) {
            var exist = false;
            var idProducSearch = item.entity_id;
            var productExists = false;
            ko.utils.arrayFilter(self.productList(), function (product) {
                if (product.getId == idProducSearch) {
                    exist = true;
                    productExists = product;
                }
            });

            if (!exist && item.isCheck()) {
                self.productList.push(new productList(item, self.symbol()));
            } else if (exist && !item.isCheck() && productExists) {
                self.productList.remove(productExists);
            }

        }

        self.addtocart = function () {
            var serviceUrl = urlBuilder.build('knockoutjs/index/addtocart');
            var data = [];

            ko.utils.arrayFilter(self.productList(), function (product) {
                data.push({
                    'product': product.getId,
                    'qty': product.qty()
                })
            });

            var result = storage.post(
                serviceUrl,
                JSON.stringify(data),
                false
            ).done(
                function (response, status) {
                    if (status == 'success') {
                        alert('add cart success');
                        // location.reload();
                        self.productList([]);
                        self.result_search([]);
                        self.search('');
                        customerData.reload(['cart'], true);
                    }
                }
            ).fail(function () {
                alert('add cart fail');
            });
        }
    }

    return Component.extend(new viewModel());
});