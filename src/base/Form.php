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
        public static $defaults = [
            /** An optional unique identifier to append to the form's name */
            "unique-name" => null,
            "attributes" => ["class" => ""]
        ];

        /**
         * Form constructor.
         * @param array $items FormItems, Containers and ItemGroups to attach to the form.
         * @param array|null $config Optional configuration for the form
         */
        function __construct(array $items, array $config = []) {
            // Instantiate
            parent::__construct($config, self::$defaults);

            // Forms generally auto-echo unless instructed to do otherwise.
            $this->change_config(["auto-echo" => true]);

            // Add items to the config
            $this->change_config(["items" => $items]);

            // Add "pgform" class
            $this->configuration["attributes"]["class"] .= " pgform";

            // Always add form name
            $this->configuration["attributes"]["name"] = get_class($this);
            if (isset($this->configuration["unique-name"])) {
                $this->configuration["attributes"]["name"] .= "|" . $this->configuration["unique-name"];
            }

            // Loop through items and apply additional logic
            foreach($this->configuration["items"] as $item) {

                // Add submit button logic
                if (isset($this->configuration["submit-text"]) && $item instanceof \pgform\fields\Submit) {
                    $item->change_attribute([
                        "value" => $this->configuration["submit-text"]
                    ]);
                }

                // Add reset button logic
                if (isset($this->configuration["reset-text"]) && $item instanceof \pgform\fields\Reset) {
                    $item->change_attribute([
                        "value" => $this->configuration["reset-text"]
                    ]);
                }

            }

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
