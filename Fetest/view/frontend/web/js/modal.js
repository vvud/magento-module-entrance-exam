require([
    'jquery',
    "Magento_Ui/js/modal/modal",
    'Magento_Customer/js/model/authentication-popup'
], function($, modal, auth) {
    // Modal 1
    var popup = modal({
        type: 'popup',
        responsive: true,
        title: 'Hello World Modal',
        buttons: [{
            text: $.mage.__('Close'),
            class: '',
            click: function() {
                this.closeModal();
            }
        }]
    }, $('#modal-alert'));

    // Modal Login
    var options = modal({
        type: 'popup',
        responsive: true,
        title: 'Login Modal',
        buttons: []
    }, $('#modal-login'));

    // Button
    $("#btn-alert").click(function() {
        $('#modal-alert').modal('openModal');
    });

    $("#btn-login").click(function() {
        $('#modal-login').modal('openModal');
    });

    $("#btn-magento").click(function() {
        auth.showModal();
    });
})