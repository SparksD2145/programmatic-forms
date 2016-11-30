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

    var activateInsuranceWatchers = function (providers) {
        if (!providers) { return; }

        current.form
            .find('select[name="insurance_provider"]')
            .on('change', function () {
                var value = $(this).val();

                // BCBS Insurance Handler
                var bcbs = current.form.find('.bcbs-insurance-container');
                (value == providers['BCBS'] ? bcbs.slideDown() : bcbs.slideUp());

                // Other Insurance Handler
                var other = current.form.find('.other-insurance-container');
                (value == providers['Other Insurance'] ? other.slideDown() : other.slideUp());
            });
    };

    var file = 'models/insurance_providers.json';

    $
        .getJSON({
            url: current.pluginDir + file
        })
        .done(activateInsuranceWatchers)

        // On failure, fall back to non-wordpress url
        .fail(function () {
            $.getJSON(file).done(activateInsuranceWatchers);
        });

})();
