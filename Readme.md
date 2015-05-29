GelocAttributeBundle  [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cleverage/akeneo-geoloc-attribute/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cleverage/akeneo-geoloc-attribute/?branch=master) [![Build Status](https://travis-ci.org/cleverage/akeneo-geoloc-attribute.svg?branch=master)](https://travis-ci.org/cleverage/akeneo-geoloc-attribute)
====================

Geolocation is an attribute for Akeneo PIM, it adds latitude and longitude field to your product form. You
can fill automatically them by using a google maps. See the screenshot :

![Geolocation](https://github.com/cleverage/akeneo-geoloc-attribute/blob/master/src/Resources/public/img/geolocation.png?raw=true)

Installation
------------

We assume you're familiar with [Composer](http://packagist.org), a dependency manager for PHP.
Use the following command to add the bundle to your `composer.json` and download the package.

If you have [Composer installed globally](<http://getcomposer.org/doc/00-intro.md#globally).

```
    $ composer require "cleverage/akeneo-geoloc-attribute"
```
Otherwise you have to download .phar file.

```
    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar require "cleverage/akeneo-geoloc-attribute"
```

Adding required bundles to the kernel
-------------------------------------

You just need to enable proper bundles inside the kernel.

```php
    <?php

    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            new CleverAge\Bundle\GelocAttributeBundle\ClerverAgeGelocAttributeBundle(),
        );
    }
```

Updating the database
---------------------

```
    php app/console doctrine:schema:update --force
```

Updating the assets
-------------------

This bundle provides a css file named `geolocation.css`, you need to include it in your layout. After that, your need
to install your assets like that :

```
    php app/console pim:install:assets
```

[phpspec](http://phpspec.net) examples
--------------------------------------

```bash
$ composer install
$ bin/phpspec run -fpretty
```

Bug tracking
------------

This bundle uses [GitHub issues](https://github.com/cleverage/akeneo-geoloc-attribute/issues).
If you have found bug, please create an issue.

Versioning
----------

Releases will be numbered with the format `major.minor.patch`.

And constructed with the following guidelines.

* Breaking backwards compatibility bumps the major.
* New additions without breaking backwards compatibility bumps the minor.
* Bug fixes and misc changes bump the patch.

For more information on SemVer, please visit [semver.org website](http://semver.org/).

MIT License
-----------

License can be found [here](https://github.com/cleverage/akeneo-geoloc-attribute/blob/master/src/Resources/meta/LICENSE).

Authors
-------

The bundle was originally created by [Arnaud Langlade](https://github.com/aRn0D). Sponsored by [Clever Age](http://clever-age.com)
See the list of [contributors](https://github.com/cleverage/akeneo-geoloc-attribute/contributors).
