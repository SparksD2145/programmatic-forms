<?php

namespace pgform {

    /**
     * Base form object from which all forms are rendered.
     * @package pgform
     */
    class Form extends Base {

        /**
         * The default configuration of the form
         */
        public $configuration = [
            /** An optional unique identifier to append to the form's name */
            "unique-name" => null,
            "attributes" => ["class" => ""]
        ];

        /**
         * Form constructor.
         * @param array $items FormItems, Containers and ItemGroups to attach to the form.
         * @param array|null $config Optional configuration for the form
         */
        function __construct(array $items, array $config = null) {
            // Forms generally auto-echo unless instructed to do otherwise.
            $this->change_config(["auto-echo" => true]);

            // Add items to the config
            $this->change_config(["items" => $items]);

            // Extend configurations
            if (isset($config)) {
                $config = array_replace_recursive($this->configuration, $config);
            } else {
                $config = $this->configuration;
            }

            // Add "pgform" class
            $config["attributes"]["class"] .= " pgform";

            // Always add form name
            $config["attributes"]["name"] = get_class($this);
            if (isset($config["unique-name"])) {
                $config["attributes"]["name"] .= "|" . $config["unique-name"];
            }

            // Loop through items and apply additional logic
            foreach($config["items"] as $item) {

                // Add submit button logic
                if (isset($config["submit-text"]) && $item instanceof \pgform\fields\Submit) {
                    $item->change_attribute([
                        "value" => $config["submit-text"]
                    ]);
                }

                // Add reset button logic
                if (isset($config["reset-text"]) && $item instanceof \pgform\fields\Reset) {
                    $item->change_attribute([
                        "value" => $config["reset-text"]
                    ]);
                }

            }

            parent::__construct($config);

            // If configured to auto render, do so.
            if ($this->configuration["auto-echo"]) {
                $this->render();
            }
        }

        /**
         * Render the form in-place on the page.
         * @method string render()
         * @return string
         */
        public function render() {
            return $this->render_element_tag("form", false, true);
        }
    }
}
