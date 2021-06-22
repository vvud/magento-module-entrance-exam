require([
    'jquery'
], function ($) {
    var waitForEl = function(selector, callback) {
        if (jQuery(selector).length) {
          callback();
        } else {
          setTimeout(function() {
            waitForEl(selector, callback);
          }, 100);
        }
        };
    var selector = '[name="customer[company_type]"]';
    waitForEl(selector, function() {
      	if ($('[name="customer[company_type]"]').val() == 3)
      		$('[data-index="organization_name"]').show();
      	else $('[data-index="organization_name"]').hide();
		  
        $('[name="customer[company_type]"]').change(function() {
            if($(this).val() == 3){
                $('[data-index="organization_name"]').show();
            } else {
                $('[data-index="organization_name"]').hide();
                $('[name="customer[organization_name]"]').val('');
          }
        })
        
    });
})
// source: https://gist.github.com/chrisjhoughton/7890303
