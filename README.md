Programmatic Forms
==================

An environment-agnostic, form-focused project aimed at delivering a better form development experience. Programmatic Forms is designed to replace the need for gravity forms on all Nobilis Health websites.

- [Installation](#installation)
	- [Cloning the Repository](#cloning-the-repository)
	- [Activation](#activation)
- [Usage](#usage)
	- [Calling Forms](#calling-forms)
    - [Building New Forms](#building-forms)



## Installation <a name="installation"></a>
As in any other Wordpress plugin, simply download, install and activate the plugin to begin using Programmatic Forms.

### Cloning the Repository <a name="cloning-the-repository"></a>
You can easily download the Programmatic Forms plugin by cloning its repository into your Wordpress `plugins` folder:

```bash
cd $wordpress_root/wp-content/plugins
git clone http://dev.northamericanspine.com/nobilishealth/programmatic-forms.git
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
<?php new \pgform\prebuilt\Main() ?>
```

Alternatively, you can alias a form to a specific name like so:

```php
<?php use \pgform\prebuilt\Main as SameFormDifferentName; ?>

<!-- (skip into the html of your page) -->

<div class="example call">
    <?php new SameFormDifferentName(); ?>
</div>
```

Additionally, Wordpress short-code form calling is on its way.


## Building New Forms <a name="building-forms"></a>
Creating a new programmatic form is a simple process. Begin with a basic boilerplate:

```php
<?php

namespace pgform\prebuilt {
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

namespace pgform\prebuilt {
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


### Adding Form Attributes
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


[wp-cli]: http://wp-cli.org/
