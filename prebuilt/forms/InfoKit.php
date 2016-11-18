<?php

namespace pgforms\prebuilt {

    use pgforms\prebuilt\fields\Country;
    use pgforms\prebuilt\fields\FirstName;
    use pgforms\prebuilt\fields\LastName;
    use pgforms\prebuilt\fields\Phone;
    use pgforms\prebuilt\fields\Email;
    use pgforms\prebuilt\fields\PrivacyPolicy;
    use pgforms\prebuilt\fields\Reset;
    use pgforms\prebuilt\fields\Submit;
    use pgforms\prebuilt\groups\AttributionGroup;
    use pgforms\prebuilt\groups\InsuranceGroup;
    use pgforms\Form;

    class InfoKit extends Form {
        function __construct(array $config = null) {
            $default_name = 'info-kit';

            if (!isset($config) || empty($config['name'])) {
                $config['name'] = $default_name;
            }

            $items = [
                new FirstName(),
                new LastName(),
                new Phone(),
                new Email(),
                new InsuranceGroup(),
                new AttributionGroup(),
                new Country(),
                new PrivacyPolicy(),
                new Submit()
            ];

            parent::__construct($items, $config);
        }
    }
}
