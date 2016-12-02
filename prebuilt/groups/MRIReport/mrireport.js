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

    current.form
        .find('input[type="radio"][name="mRISendMethod"]')
        .each(function () {
            jQuery(this).on('click', function () {
                var value = jQuery(this).val();

                // Other Insurance Handler
                var infoPanel = current.form.find('#mri-center-info');
                if (value == "true") {
                    infoPanel.slideDown();
                    infoPanel.find('[name=imagingCenter]').attr('required', true);
                    infoPanel.find('[name=DateofBirth]').attr('required', true);
                } else {
                    infoPanel.slideUp();
                    infoPanel.find('[name=imagingCenter]').attr('required', false);
                    infoPanel.find('[name=DateofBirth]').attr('required', false);
                }
                (value == "true" ? infoPanel.slideDown() : infoPanel.slideUp());
            });
        });
})();
