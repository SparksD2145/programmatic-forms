<?php

namespace nobilis\forms\base {
    class FormItem {
        public $configuration = [
            "name" => null,
            "id" => null,
            "class" => null,
            "placeholder" => null
        ];

        function __construct (array $config = null) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }
    }
}
