Jitsu Wrapper Classes
---------------------

This package includes object-oriented wrapper classes for PHP strings, arrays,
and regular expressions (respectively, `Jitsu\XString`, `Jitsu\XArray`, and
`Jitsu\XRegex`). These classes simply build upon the functions in the packages
`jitsu/string`, `jitsu/array`, and `jitsu/regex`, providing an
object-oriented interface to the static methods implemented there. The OOP
versions automatically unwrap their arguments and wrap their return values.

Here's a quick example to illustrate their tremendous usefulness:

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
