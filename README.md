# Laravel GitLab Webhooks

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dependenci/gitlab-webhooks.svg?style=flat-square)](https://packagist.org/packages/dependenci/gitlab-webhooks)
[![Software License](https://img.shields.io/badge/license-MPLv2.0-blue.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/dependenci/gitlab-webhooks.svg?style=flat-square)](https://packagist.org/packages/dependenci/gitlab-webhooks)

Easy-to-use class to transform GitLab Webhooks to Laravel Events.

## Installation

You can install the package via composer using this command:

``` bash
composer require dependenci/gitlab-webhooks
```

## Usage

``` php
use GLWebhooks;

public function handleWebhook()
{
  return GLWebhooks::handle();
}
```

## Contributing

Read our [CONTRIBUTING.md](CONTRIBUTING.md) for more details on how to help us.

## Security

If you find any security related issues, please send an email to soy@miguelpiedrafita.com instead of using the issue tracker.

## Credits

- [Miguel Piedrafita](https://github.com/m1guelpf)
- [All Contributors](../../contributors)

## License

This package is licensed under the Mozilla Public License 2.0 ("MPL-2.0"). Please see [LICENSE.md](LICENSE.md) for more information.
