# Eloquent UUID

[![Build Status](https://img.shields.io/travis/faustbrian/Eloquent-UUID/master.svg?style=flat-square)](https://travis-ci.org/faustbrian/Eloquent-UUID)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/faustbrian/eloquent-uuid.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/faustbrian/Eloquent-UUID.svg?style=flat-square)](https://github.com/faustbrian/Eloquent-UUID/releases)
[![License](https://img.shields.io/packagist/l/faustbrian/Eloquent-UUID.svg?style=flat-square)](https://packagist.org/packages/faustbrian/Eloquent-UUID)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/eloquent-uuid
```

## Usage

``` php
<?php

namespace App;

use BrianFaust\Uuid\HasUuid;
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

If you discover a security vulnerability within this package, please send an e-mail to hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
