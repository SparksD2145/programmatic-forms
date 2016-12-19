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

    jQuery(document).ready(function(){
        current.form.find('.submit').click(function(){
            current.form.addClass('submitform');
        });
        current.form.find('.phone').mask('(999) 999-9999');
    });

})();