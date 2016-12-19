<?php

/**
 * Programmatic Forms global namespace.
 * @package pgform
 */
namespace pgform {

    use pgform\prebuilt\groups\FormIDGroup;

    /**
     * Base form object from which all forms are rendered.
     * @package pgform
     */
    class Form {

        /**
         * @var array $configuration The default configuration of the form
         * @private
         */
        private $configuration = [
            "items" => [],
            "autorender" => true,
            "newline" => true,
            "unique-name" => null,
            "attributes" => [
                "name" => null,
                "id" => null,
                "class" => null,
                "accept" => null,
                "action" => null,
                "method" => null,

                // For Nobilis Script to interpret form
                "data-async-submit" => true
            ]
        ];

        /**
         * Form constructor.
         * @param array $items FormItems, Containers and ItemGroups to attach to the form.
         * @param array|null $config Optional configuration for the form
         * @param array|null $attrs Optional attributes for the form (overrides configuration)
         */
        function __construct(array $items, array $config = null, array $attrs = null) {
            // Extend items
            $this->configuration['items'] = array_replace($this->configuration['items'], $items);

            // Extend configurations
            if (isset($config)) {
                $this->configuration = array_replace_recursive($this->configuration, $config);
            }

            // Extend attributes
            if (isset($attrs) && !empty($attrs)) {
                $this->configuration['attributes'] = array_replace($this->configuration['attributes'], $attrs);
            }

            // Add 'pgform' class
            $this->configuration['attributes']['class'] .= " pgform";

            // Always add FormID Item
            $formID = new FormIDGroup($this, $this->configuration);
            array_push($this->configuration['items'], $formID);

            // if autorender is configured, render the form automatically upon instantiation.
            if ($this->configuration['autorender']) {
                $this->render();
            }
        }

        /**
         * Render the form in-place on the page.
         * @method string render()
         * @return string
         */
        public function render() {

            // Open form
            $builder = "<form ";

            // Clone attrs to remove items from the list.
            $attrs = array_merge([], $this->configuration['attributes']);

            // Take each value from the attrs and add it as an attribute.
            foreach ($attrs as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $builder .= "$key='$value' ";
                }
            }

            // Close opening form tag.
            $builder .= ">";

            // Render items
            if (!empty($this->configuration['items'])) {

                // Add form items.
                foreach ($this->configuration['items'] as $item) {
                    $builder .= $item->render();

                    // If newline is set, all form items will be on a separate line.
                    if ($this->configuration['newline']) {
                        $builder .= "\n";
                    }
                }
            }

            // Close form tag.
            $builder .= '</form>';

            // Render
            echo $builder;
            return $builder;
        }
    }
}
