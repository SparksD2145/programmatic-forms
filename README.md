Programmatic Forms
==================

An environment-agnostic, form-focused project aimed at delivering a better form development experience.

- [Installation](#installation)
	- [Cloning the Repository](#cloning-the-repository)
	- [Activation](#activation)
- [Usage](#usage)
	- [Calling Forms](#calling-forms)
    - [Building New Forms](#building-forms)
    - [Adding Form Attributes](#form-attributes)
    - [Advanced Form Building](#building-forms-advanced)
        - [Extending an Existing Form](#extending-a-form)
        - [Grouping Forms](#grouping-forms)



## Installation <a name="installation"></a>
As in any other Wordpress plugin, simply download, install and activate the plugin to begin using Programmatic Forms.

### Cloning the Repository <a name="cloning-the-repository"></a>
You can easily download the Programmatic Forms plugin by cloning its repository into your Wordpress `plugins` folder:

```bash
cd $wordpress_root/wp-content/plugins
git clone git@github.com:SparksD2145/programmatic-forms.git
```

### Activation <a name="activation"></a>
Once the repository is cloned, you must activate the plugin in your Wordpress administration panel. If you have [Wordpress CLI][wp-cli] installed, you can activate the plugin via the command line:

```bash
cd $wordpress_root
wp plugin activate programmatic-forms
```



## Usage <a name="usage"></a>
Programmatic Forms is intended to be utilized in an object-oriented fashion and is inspired by ReactJS. Each object in the project provides a `render()` method which returns the HTML result of the render, passing it's result up the stream until it reaches a base object which outputs the result to the user.


### Calling Forms <a name="calling-forms"></a>
You can opt to use any prebuilt object or form by simply calling it.

```php
<?php new \pgform\forms\Demo() ?>
```

Or in Wordpress shortcode:

```html
[pgform form="Demo"]
```

Alternatively, you can alias a form to a specific name like so:

```php
<?php use \pgform\forms\Demo as SameFormDifferentName; ?>

<!-- (skip into the html of your page) -->

<div class="example call">
    <?php new SameFormDifferentName(); ?>
</div>
```



## Building New Forms <a name="building-forms"></a>
Creating a new programmatic form is a simple process. Begin with a basic boilerplate:

```php
<?php

namespace pgform\forms {
    use pgform\Form;

	class MY_FORM_NAME extends Form {
		function __construct() {
			parent::__construct([]);
        }
	}
}
```

In this basic boilerplate, we have created a form called `MY_FORM_NAME`  and passed it an empty array of form items. As there are no items to render, this form will output a `<form class="pgform"></form>` tag set with no child form inputs. We can add form items to this array like so:

```php
<?php

namespace pgform\forms {
    use pgform\Form;
    use pgform\prebuilt\fields\FirstName;
    use pgform\prebuilt\fields\LastName;
    use pgform\prebuilt\groups\Footer;

	class MY_FORM_NAME extends Form {
		function __construct() {
			parent::__construct([
				new FirstName(),
                new LastName(),
                new Footer()
			]);
        }
	}
}
```

This will result in a first name input, a last name input, and a submit/reset button group.

Ideally, forms are intended to be programmatically configurable by passing parameters to a form or form item's constructor. Please refer to existing forms for an example of this behavior.




### Adding Form Attributes <a name="form-attributes"></a>
Adding HTML attributes such as `class` or `name` to a form or form item involves manipulating the configuration object it is passed on instantiation. All attributes are contained under the `attributes` key in the configuration object, like so:

```php
<?php
new FirstName([
	"attributes" => [
		"class" => "half-width form-control",
		"name" => "first_name",
		"required" => true
	]
]);
```

Bear in mind any attribute you specify will override the default value of that attribute.




## Advanced Form Building <a name="building-forms-advanced"></a>
Building a basic form is easy, but extensibility and scalability are what make Programmatic Forms useful.

### Extending an Existing Form <a name="extending-a-form"></a>
Reusing and building on top of an existing form's configuration is simple. This example will extend the `Demo` form, remove its first element and append a new hidden field at the end of the extended item list.

```php
<?php
namespace pgform\forms {
    use pgform\elements\Hidden;
    
    /**
     * Extended Demo form
     * @package pgform\forms
     */
    class DemoFormButBetter extends Demo {
        /**
         * DemoFormButBetter constructor.
         * @param array $config optional configuration
         */
        function __construct($config = []) {
            parent::__construct($config);
        }
        /**
         * Actions to execute prior to rendering
         */
        public function pre_render () {
            $this->remove(0);
            $this->insert(new Hidden());
        }
    }
}
```

Using the `pre_render` method allows a developer to execute a set of actions against the extended form, thereby modifying the output of that form.


### Grouping Forms <a name="grouping-forms"></a>
Grouping forms together allows a developer to provide a common set of directives to a set of forms, rather than a single form at a time. Consider the following example: 

```php
<?php
namespace pgform\forms {
    use pgform\traits\DemoTrait;
    
    /**
     * Extended Demo form
     * @package pgform\forms
     */
    class DemoFormButBetter extends Demo {
        use DemoTrait;
        
        /**
         * DemoFormButBetter constructor.
         * @param array $config optional configuration
         */
        function __construct($config = []) {
            parent::__construct($config);
        }
    }
}
```

Using the `DemoTrait` trait associates the form with the `DemoTrait` group. Again, this allows the developer to execute a set of actions against all forms in that group, like so:

```php
<?php
namespace pgform\traits {

    use pgform\elements\Input;

    /**
     * Demo Trait
     * @package pgform\traits
     */
    trait DemoTrait {

        /** Associate this trait with a particular class */
        public function associate () {
            $this->amend_string_attribute("class", "demo-association");
            $this->insert(new Input());
        }

        /** Abstracted functions */
        abstract public function insert($item, $where = null);
        abstract public function amend_string_attribute($key, $value);
    }
}
```



[wp-cli]: http://wp-cli.org/
