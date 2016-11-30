(function () {
    var current = (function autoInitialize () {
        var scripts = $('script');
        var thisScript = scripts.get([ scripts.length - 1 ]);

        return {
            script: $(thisScript),
            form: $(thisScript).closest('form'),
            pluginDir: '/wp-content/plugins/programmatic-forms/'
        }
    })();

    current.form
        .find('input[type="radio"][name="mRISendMethod"]')
        .each(function () {
            $(this).on('click', function () {
                var value = $(this).val();

                // Other Insurance Handler
                var infoPanel = current.form.find('#mri-center-info');
                (value == "true" ? infoPanel.slideDown() : infoPanel.slideUp());
            });
        });
})();
