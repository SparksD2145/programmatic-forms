(function autoInitialize () {

    /**
     * PGForm constructor.
     * @constructor
     */
    function PGForm () {}

    /**
     * Retrieves the currently active script
     * @returns {{script: *, form: *, pluginDir: string}}
     */
    PGForm.prototype.current = function () {
        var scripts = jQuery('script');
        var thisScript = scripts.get([ scripts.length - 1 ]);

        return {
            script: jQuery(thisScript),
            form: jQuery(thisScript).closest('form'),
            pluginDir: '/wp-content/plugins/programmatic-forms/'
        }
    };

    /**
     * Initialize all forms on page with this logic
     */
    PGForm.prototype.initForms = function () {
        jQuery('form.pgform').each(function () {
            var form = jQuery(this);

            // Add submit button handler
            form.find('[type="submit"]').click(function(){
                form.addClass('form-submit-attempted');
            });

            form.find('[type="reset"]').click(function(){
                form.removeClass('form-submit-attempted');
            });
        });
    };

    window.PGForm = new PGForm();
    jQuery(document).ready(window.PGForm.initForms());
})();
