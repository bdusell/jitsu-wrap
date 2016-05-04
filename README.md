jitsu/wrap
----------

This package includes object-oriented wrapper classes for PHP strings, arrays,
and regular expressions (respectively, `Jitsu\XString`, `Jitsu\XArray`, and
`Jitsu\XRegex`). These classes simply build upon the functions in the packages
[`jitsu/string`](https://github.com/bdusell/jitsu-string),
[`jitsu/array`](https://github.com/bdusell/jitsu-array), and
[`jitsu/regex`](https://github.com/bdusell/jitsu-regex), providing an
object-oriented interface to the static methods implemented there. The OOP
versions automatically unwrap their arguments and wrap their return values.

This package is part of [Jitsu](https://github.com/bdusell/jitsu).

## Installation

Install this package with [Composer](https://getcomposer.org/):

```sh
composer require jitsu/wrap
```

## Namespace

All classes are defined under the namespace `Jitsu`.

## Usage

Here's a quick example to illustrate this package's tremendous usefulness:

```php
use Jitsu\XArray;
use Jitsu\XString;

// Wisdom from the ancient Romans?
$s = new XString('Repus Terces Egassem');

// Maybe not...
echo $s->split()->map(function($s) {
	return (new XString($s))->lowerFirst()->reverse()->capitalize();
})->join(' '), "\n";
// => Super Secret Message
```

## API

