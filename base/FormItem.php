<?php

namespace nobilis\marketing\forms\base {
    class FormItem {
        public $configuration = array(
            "name" => null,
            "id" => null,
            "class" => null,
            "placeholder" => null
        );

        function __construct ($config) {
            if (isset($config) && !empty($config)) {
                $this->configuration = array_merge($this->configuration, $config);
            }
        }
    }
}