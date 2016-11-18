<?php

namespace pgforms\prebuilt\fields {
    require_once(dirname(__FILE__) . "/../../types/Input.php");
    use pgforms\types\Input;
    use pgforms\types\Label;

    class PrivacyPolicy extends Input {
        private static $config = [
            "name" => "acceptedPrivacyPolicy",
            "type" => "checkbox"
        ];

        function __construct($config = null) {
            if (!isset($config)) $config = [];
            $config = array_merge(self::$config, $config);
            parent::__construct($config);
        }

        public function render() {
            // Open input tag
            $builder = "<input ";

            // Enter each configured value as an attribute.
            foreach ($this->configuration as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close tag
            $builder .= " />";

            $label = new Label([
                "text" => 'I accept the <a href=\"/privacy-policy/\" target=\"_blank\" style=\"color: #e28a1e\">Privacy Policy</a> and <a href=\"/user-agreement/\" target=\"_blank\" style=\"color: #e28a1e\">User Agreement</a>.<span class=\"required\">*</span></label>'
            ]);

            $builder .= $label->render();

            // Render
            return $builder;
        }
    }
}