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
        current.form
            .find('select[name="insurance_provider"]')
            .on('change', function () {
                var value = $(this).val();

                // BCBS Insurance Handler
                var bcbs = current.form.find('[name="insurance_state_bcbs"]');
                (value == providers['BCBS'] ? bcbs.slideDown() : bcbs.slideUp());

                // Other Insurance Handler
                var other = current.form.find('[name="other_insurance"]');
                (value == providers['Other Insurance'] ? other.slideDown() : other.slideUp());
            });
    }

    $.get({
        url: current.pluginDir + 'models/insurance_providers.json'
    }).done(activateInsuranceWatchers);
})();
