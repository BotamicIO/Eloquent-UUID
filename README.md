# Eloquent UUID

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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
