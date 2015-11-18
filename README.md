# Aerospike PHP Stubs

[![Software License](https://img.shields.io/packagist/l/sergeyklay/aerospike-php-stubs.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/sergeyklay/aerospike-php-stubs.svg?style=flat-square)](https://packagist.org/packages/sergeyklay/aerospike-php-stubs)

![screenshot](http://i.imgur.com/55EKJIU.png "Screenshot")

When working with PHP Aerospike class may crop up some difficulties when to use syntax highlighting or code autocompletion.
This repo provide the most complete Aerospike PHP stubs which allows autocomplete in modern IDEs.

Grabbed by using [Reflection](http://php.net/manual/en/book.reflection.php) from `aerospike.so` v3.4.5
and [Aerospike doc](https://github.com/aerospike/aerospike-client-php/blob/master/doc/aerospike.md)

## Install

Install composer in a common location:

```bash
curl -s http://getcomposer.org/installer | php
``` 

Create the composer.json file as follows:

```json
{
    "require": {
        "sergeyklay/aerospike-php-stubs": "dev-master"
    }
}
```

Run the composer installer:

```bash
php composer.phar install
```

Setup your IDE.

## License

Aerospike PHP Stubs is open-sourced software licensed under the [MIT](LICENSE).
© Serghei Iakovlev and contributors
