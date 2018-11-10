# An implementation of Specification pattern.

## Installation
You can install this library using [Composer](http://getcomposer.org)

Information about how to install composer you can find in [official](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) website.

### Command line
In root directory of your project run through a console:
```bash
$ composer require "larium/specification":"@stable"
```
### Composer.json
Include require line in your ```composer.json``` file
```json
{
	"require": {
    	"larium/specification": "@stable"
    }
}
```
and run from console in the root directory of your project:
```bash
$ composer update
```

After this you must require autoload file from composer.
```php
<?php
require_once 'vendor/autoload.php';
```
