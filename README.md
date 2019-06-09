# Eloquent UUID

[![Build Status](https://img.shields.io/travis/artisanry/Eloquent-UUID/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Eloquent-UUID)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/eloquent-uuid.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Eloquent-UUID.svg?style=flat-square)](https://github.com/artisanry/Eloquent-UUID/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Eloquent-UUID.svg?style=flat-square)](https://packagist.org/packages/artisanry/Eloquent-UUID)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/eloquent-uuid
```

## Usage

``` php
<?php

namespace App;

use Artisanry\Uuid\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasUuid;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get the options for generating the uuid.
     */
    public function getUuidOptions() : UuidOptions
    {
        return UuidOptions::create()
            ->saveTo('uuid')
            ->useStrategy('uuid3')
            ->withNamespace(\Ramsey\Uuid\Uuid::NAMESPACE_DNS)
            ->withName('php.net');
    }
}

```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

Mozilla Public License Version 2.0 ([MPL-2.0](./LICENSE)).
