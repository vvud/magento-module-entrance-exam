require([
        'jquery',
        'Magento_Ui/js/modal/alert'
    ],
    function($, alert) {
    $('#btn-alert').on('click', 'button.alert', function(event){
            // alert({
            // content: $(event.target).parent().text()
            // })
            alert({
                content: "Hello World"
            })
    })
    }
);