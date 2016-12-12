Programmatic Forms
==================

An environment-agnostic, form-focused project aimed at delivering a better form development experience. Programmatic Forms is designed to replace the need for gravity forms on all Nobilis Health websites.


## Installation
As in any other wordpress plugin, simply download, install and activate the plugin to begin using Programmatic Forms.

### Cloning the Repository
You can easily download the Programmatic Forms plugin by cloning its repository into your wordpress `plugins` folder:

```bash
cd $wordpress_root/wp-content/plugins
git clone http://dev.northamericanspine.com/nobilishealth/programmatic-forms.git
```


### Activation
Once the repository is cloned, you must activate the plugin in your Wordpress administration panel. If you have [Wordpress CLI][wp-cli] installed, you can activate the plugin via the command line:

```bash
cd $wordpress_root
wp plugin activate programmatic-forms
```

## Usage
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

Additionally, wordpress short-code form calling is on its way.








[wp-cli]: http://wp-cli.org/
