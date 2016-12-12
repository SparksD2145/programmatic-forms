Programmatic Forms
==================

A project aimed at delivering a better form development experience, replacing the need for gravity forms on all Nobilis Health websites.


## Installation
You can easily install Programmatic forms by cloning its repository into your wordpress `plugins` folder.

```bash
cd $wordpress_root/wp-content/plugins
git clone http://dev.northamericanspine.com/nobilishealth/programmatic-forms.git
```

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









[wp-cli]: http://wp-cli.org/
