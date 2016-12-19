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
                var bcbsContainer = current.form.find('.bcbs-insurance-container');
                var bcbs = current.form.find('[name=insurance_state_bcbs]');
                if (value == providers['BCBS']) {
                    bcbsContainer.slideDown();
                    bcbs.attr("required",true);
                } else {
                    bcbsContainer.slideUp();
                    bcbs.attr("required",false);
                }

                // Other Insurance Handler
                var otherContainer = current.form.find('.other-insurance-container');
                var other = current.form.find('[name=other_insurance]');
                if (value == providers['Other Insurance']) {
                    otherContainer.slideDown();
                    other.attr("required",true);
                } else {
                    otherContainer.slideUp();
                    other.attr("required",false);
                }
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
