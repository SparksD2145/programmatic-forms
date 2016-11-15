Programmatic Forms
==================

A work-in-progress project aimed at delivering a better form development experience.


## Installation
You can easily install Programmatic forms by cloning its repository into your wordpress `plugins` folder.

```bash
cd $wordpress_root/wp-content/plugins
git clone http://dev.northamericanspine.com/nobilishealth/programmatic-forms.git
```

Once the repository is cloned, you must activate the plugin in your wordpress administration panel.


## Usage
You can opt to use any prebuilt object or form by simply calling it.

```php
<?php new \pgforms\prebuilt\Main() ?>
```
