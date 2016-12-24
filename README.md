# Aerospike PHP Stubs

[![Software License](https://img.shields.io/packagist/l/sergeyklay/aerospike-php-stubs.svg?style=flat-square)][:license:]
[![Total Downloads](https://img.shields.io/packagist/dt/sergeyklay/aerospike-php-stubs.svg?style=flat-square)][:packagist:]

![screenshot](http://i.imgur.com/55EKJIU.png "Screenshot")

When working with PHP Aerospike class may crop up some difficulties when to use syntax highlighting or code autocompletion.
This repo provide the most complete Aerospike PHP stubs which allows autocomplete in modern IDEs.

Grabbed by using [Reflection][:reflection:] from `aerospike.so`
and [Aerospike doc][:doc:]

## Install

Install composer in a common location:

```bash
curl -s http://getcomposer.org/installer | php
``` 

Create the composer.json file as follows:

```json
{
    "require": {
        "sergeyklay/aerospike-php-stubs": "*"
    }
}
```

Run the composer installer:

```bash
php composer.phar install
```

Setup your IDE.

## License

Aerospike PHP Stubs is open-sourced software licensed under the [MIT][:license:].
© Serghei Iakovlev and contributors

[:doc:]: https://github.com/aerospike/aerospike-client-php/blob/master/doc/aerospike.md
[:reflection:]: http://php.net/manual/en/book.reflection.php
[:packagist:]: https://packagist.org/packages/sergeyklay/aerospike-php-stubs
[:license:]: https://github.com/sergeyklay/aerospike-php-stubs/blob/master/LICENSE
