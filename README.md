# Microsoft Cognitive Face Service APIs Client Library for PHP #
[![Latest Stable Version](https://poser.pugx.org/hymns/microsoft-cognitive-face/v/stable)](https://packagist.org/packages/hymns/microsoft-cognitive-face)
[![Total Downloads](https://poser.pugx.org/hymns/microsoft-cognitive-face/downloads)](https://packagist.org/packages/hymns/microsoft-cognitive-face)
[![License](https://poser.pugx.org/hymns/microsoft-cognitive-face/license)](https://packagist.org/packages/hymns/microsoft-cognitive-face)

The cloud-based Face API provides developers with access to advanced face algorithms. Microsoft Cognitive Face algorithms analyze specificed face attribute detection such as age, gender, smile, hair and much more.

## Requirements ##
* [PHP 7.1.0 or higher](http://www.php.net/)

## Installation ##

You can use **Composer** or simply **Download the Release**

### Composer

The preferred method is via [composer](https://getcomposer.org). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require hymns/microsoft-cognitive-face
```

Finally, be sure to include the autoloader:

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

### Download the Release

If you abhor using composer, you can download the package in its entirety. The [Releases](https://github.com/hymns/microsoft-cognitive-face/releases) page lists all stable versions. Download any file
with the name `microsoft-cognitive-face-[RELEASE_NAME].zip` for a package including this library and its dependencies.

Uncompress the zip file you download, and include the autoloader in your project:

```php
require_once '/path/to/microsoft-cognitive-face/vendor/autoload.php';
```

## Examples ##

### Detect Faces from Image ###

```php
// include your composer dependencies
require_once 'vendor/autoload.php';

$client = new \Hymns\MicrosoftCognitiveFace\Client('YOUR_APP_KEY', 'YOUR_REGION');
$faces  = $client->face()->detectFacesFromImage('URL_IMAGE');

print_r($faces);
```

### Verify Two Faces Image ###

```php
require_once 'vendor/autoload.php';

$client = new \Hymns\MicrosoftCognitiveFace\Client('YOUR_APP_KEY', 'YOUR_REGION');
$faces  = $client->face()->verifyTwoFaces('URL_IMAGE');

print_r($faces);
```