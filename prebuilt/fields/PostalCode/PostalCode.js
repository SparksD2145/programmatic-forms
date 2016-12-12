(function () {
    var current = (function autoInitialize () {
        var scripts = jQuery('script');
        var thisScript = scripts.get([ scripts.length - 1 ]);

        return {
            script: jQuery(thisScript),
            form: jQuery(thisScript).closest('form'),
            pluginDir: '/wp-content/plugins/programmatic-forms/'
        }
    })();

    var postalCodeValue = "";
    current.form.find('[name="PostalCode"]').on('input', function(){
        var newValue = jQuery(this).val();

        if (!/^\d*$/.test(newValue)) {
            newValue = postalCodeValue;
        } else {
            postalCodeValue = newValue;
        }

        jQuery(this).val(newValue);
    });

})();
