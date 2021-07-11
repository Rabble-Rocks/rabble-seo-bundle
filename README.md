# Rabble Seo Bundle
The SEO bundle includes tools necessary to get your website into search engines.

# Installation
Install the bundle by running
```sh
composer require rabble/seo-bundle
```

Add the following class to your `config/bundles.php` file:
```php
return [
    ...
    Rabble\SeoBundle\RabbleSeoBundle::class => ['all' => true],
]
```
