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

    window.PGForm = new PGForm();
})();



