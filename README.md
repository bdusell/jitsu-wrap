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

### class Jitsu\\XString

An object-oriented wrapper for the `string` type.

See [jitsu/string](https://github.com/bdusell/jitsu-string).

#### new XString($value = '')

|   | Type |
|---|------|
| **`$value`** | `string|self` |

#### $x\_string->\_\_toString()

#### XString::unwrap($x)

#### $x\_string->length()

#### $x\_string->size()

#### $x\_string->isEmpty()

#### $x\_string->equal($that)

#### $x\_string->iEqual($that)

#### $x\_string->chars()

#### $x\_string->chunks($n)

#### $x\_string->split($delim = null, $limit = null)

#### $x\_string->tokenize($chars)

#### $x\_string->join($strs = null)

#### $x\_string->trim($chars = null)

#### $x\_string->rtrim($chars = null)

#### $x\_string->ltrim($chars = null)

#### $x\_string->lower()

#### $x\_string->upper()

#### $x\_string->lcfirst()

#### $x\_string->lowerFirst()

#### $x\_string->ucfirst()

#### $x\_string->upperFirst()

#### $x\_string->ucwords()

#### $x\_string->capitalize()

#### $x\_string->capitalizeWords()

#### $x\_string->replace($old, $new)

#### $x\_string->replaceAndCount($old, $new)

#### $x\_string->iReplace($old, $new)

#### $x\_string->iReplaceAndCount($old, $new)

#### $x\_string->replaceMultiple($pairs)

#### $x\_string->translate($old, $new)

#### $x\_string->substring($offset, $length = null)

#### $x\_string->replaceSubstring($new, $offset, $length = null)

#### $x\_string->slice($i, $j = null)

#### $x\_string->replaceSlice($new, $i, $j = null)

#### $x\_string->insert($new, $offset)

#### $x\_string->pad($n, $pad = ' ')

#### $x\_string->lpad($n, $pad = ' ')

#### $x\_string->rpad($n, $pad = ' ')

#### $x\_string->wrap($cols, $sep = "\\n")

#### $x\_string->repeat($n)

#### $x\_string->reverse()

#### $x\_string->startingWith($substr)

#### $x\_string->iStartingWith($substr)

#### $x\_string->rStartingWith($char)

#### $x\_string->startingWithChars($chars)

#### $x\_string->preceding($substr)

#### $x\_string->iPreceding($substr)

#### $x\_string->words($chars = null)

#### $x\_string->wordCount($chars = null)

#### $x\_string->findWords($chars = null)

#### $x\_string->wordWrap($width, $sep = "\\n")

#### $x\_string->compare($that)

#### $x\_string->iCompare($that)

#### $x\_string->nCompare($that, $n)

#### $x\_string->inCompare($that, $n)

#### $x\_string->localeCompare($that)

#### $x\_string->humanCompare($that)

#### $x\_string->iHumanCompare($that)

#### $x\_string->substringCompare($that, $offset, $length)

#### $x\_string->iSubstringCompare($that, $offset, $length)

#### $x\_string->contains($substr, $offset = 0)

#### $x\_string->iContains($substr, $offset = 0)

#### $x\_string->containsChars($chars)

#### $x\_string->containsChar($char)

#### $x\_string->beginsWith($prefix)

#### $x\_string->iBeginsWith($prefix)

#### $x\_string->endsWith($suffix)

#### $x\_string->iEndsWith($suffix)

#### $x\_string->removePrefix($prefix)

#### $x\_string->iRemovePrefix($prefix)

#### $x\_string->removeSuffix($suffix)

#### $x\_string->iRemoveSuffix($suffix)

#### $x\_string->find($substr, $offset = 0)

#### $x\_string->iFind($substr, $offset = 0)

#### $x\_string->rFind($substr, $offset = 0)

#### $x\_string->before($substr)

#### $x\_string->after($substr)

#### $x\_string->isLower()

#### $x\_string->isUpper()

#### $x\_string->isAlphanumeric()

#### $x\_string->isAlphabetic()

#### $x\_string->isControl()

#### $x\_string->isDecimal()

#### $x\_string->isHex()

#### $x\_string->isVisible()

#### $x\_string->isPrintable()

#### $x\_string->isPunctuation()

#### $x\_string->isWhitespace()

#### $x\_string->count($substr, $offset = 0, $length = null)

#### $x\_string->characterRun($chars, $begin = 0, $end = null)

#### $x\_string->escapeCString()

#### $x\_string->unescapeCString()

#### $x\_string->escapePhpString()

#### $x\_string->unescapeBackslashes()

#### $x\_string->parseInt($base = null)

#### $x\_string->parseReal()

#### $x\_string->encodeHex()

#### $x\_string->decodeHex()

#### $x\_string->encodeBase64()

#### $x\_string->decodeBase64()

#### XString::fromAscii($n)

#### XString::chr($n)

#### $x\_string->toAscii()

#### $x\_string->ord()

#### $x\_string->byteCounts()

#### $x\_string->unique()

#### $x\_string->unusedBytes()

#### $x\_string->encodeHtml($noquote = false)

#### $x\_string->escapeHtml($noquote = false)

#### $x\_string->unencodeHtml()

#### XString::encodeHtmlDict($noquote = false)

#### $x\_string->encodeHtmlEntities()

#### XString::encodeHtmlEntitiesDict()

#### $x\_string->stripTags()

#### $x\_string->parseRawQueryString()

#### XString::encodeStandardQueryString($data, $sep = '&')

#### XString::encodeQueryString($data, $sep = '&')

#### $x\_string->encodeStandardUrl()

#### $x\_string->decodeStandardUrl()

#### $x\_string->encodeUrl()

#### $x\_string->decodeUrl()

#### $x\_string->parseCsv($delim = ',', $quote = '"', $escape = '\\\\')

#### $x\_string->md5()

#### $x\_string->md5Hex()

#### $x\_string->sha1()

#### $x\_string->sha1Hex()

#### $x\_string->rot13()

#### $x\_string->shuffle()

#### $x\_string->formatMoney()

#### XString::formatNumber($number, $decimals = 0, $decimal\_point = '.', $thousands\_sep = ',')

#### $x\_string->levenshtein($that, $ins = null, $repl = null, $del = null)

#### $x\_string->splitCamelCase()

#### $x\_string->pluralize()

#### XString::capture($callback)

### class Jitsu\\XArray

An object-oriented wrapper class for the `array` type.

See [jitsu/array](https://github.com/bdusell/jitsu-array).

#### new XArray($value = array())

|   | Type |
|---|------|
| **`$value`** | `array|self` |

#### $x\_array->\_\_toString()

|   | Type |
|---|------|
| returns | `string` |

#### $x\_array->count()

#### $x\_array->getIterator()

#### $x\_array->offsetExists($offset)

#### $x\_array->offsetGet($offset)

#### $x\_array->offsetSet($offset, $value)

#### $x\_array->offsetUnset($offset)

#### XArray::unwrap($x)

#### $x\_array->join($str = '')

#### $x\_array->size()

#### $x\_array->length()

#### $x\_array->isEmpty()

#### $x\_array->get($key, $default = null)

#### $x\_array->getRef($key, $default = null)

#### $x\_array->hasKey($key)

#### XArray::normalizeKey($k)

#### $x\_array->remove($key)

#### $x\_array->keys()

#### $x\_array->values()

#### $x\_array->listValues($keys, $default = null)

#### $x\_array->requireValues($keys)

#### $x\_array->first()

#### $x\_array->last()

#### $x\_array->append($value)

#### $x\_array->appendMany($values)

#### $x\_array->concat($array)

#### $x\_array->push($value)

#### $x\_array->pop()

#### $x\_array->shift()

#### $x\_array->unshift($value)

#### $x\_array->keyOf($value)

#### $x\_array->indexOf($value)

#### $x\_array->keysOf($value)

#### $x\_array->contains($value)

#### $x\_array->at($i)

#### $x\_array->pairAt($i)

#### $x\_array->keyAt($i)

#### $x\_array->slice($i, $j = null)

#### $x\_array->pairSlice($i, $j = null)

#### $x\_array->assignSlice($sub, $i, $j = null)

#### $x\_array->removeSlice($i, $j = null)

#### $x\_array->reverse()

#### $x\_array->reversePairs()

#### XArray::range($i, $j = null, $step = 1)

#### XArray::fromPairs($pairs)

#### XArray::fromLists($keys, $values)

#### $x\_array->toSet($value = true)

#### XArray::fill($value, $n)

#### $x\_array->pad($value, $n)

#### $x\_array->pluck($key)

#### $x\_array->pick($keys)

#### $x\_array->getPick($keys, $default = null)

#### $x\_array->invert()

#### $x\_array->extend($array)

#### $x\_array->deepExtend($array)

#### $x\_array->chunks($n)

#### $x\_array->map($callback)

#### $x\_array->filter($callback = null)

#### $x\_array->filterPairs($callback)

#### $x\_array->sum()

#### $x\_array->product()

#### $x\_array->reduce($callback, $initial = null)

#### $x\_array->apply($callback)

#### $x\_array->traverseLeaves($callback)

#### $x\_array->difference($array, $key\_cmp = null, $value\_cmp = true)

#### $x\_array->pairDifference($array, $key\_cmp = null, $value\_cmp = null)

#### $x\_array->keyDifference($array, $key\_cmp = null)

#### $x\_array->valueDifference($array, $value\_cmp = null)

#### $x\_array->pairIntersection($array, $key\_cmp = null, $value\_cmp = null)

#### $x\_array->keyIntersection($array, $key\_cmp = null)

#### $x\_array->valueIntersection($array, $value\_cmp = null)

#### $x\_array->uniqueValues()

#### $x\_array->hasOnlyKeys($keys, &$unexpected = null)

#### $x\_array->hasKeys($keys, &$missing = null)

#### $x\_array->hasExactKeys($keys, &$unexpected = null, &$missing = null)

#### $x\_array->randomKey()

#### $x\_array->randomValue()

#### $x\_array->randomPair()

#### $x\_array->randomKeys($n)

#### $x\_array->shuffle()

#### $x\_array->sort($value\_cmp = null)

#### $x\_array->reverseSort()

#### $x\_array->localeSort()

#### $x\_array->sortPairs($value\_cmp = null)

#### $x\_array->reverseSortPairs()

#### $x\_array->sortKeys($key\_cmp = null)

#### $x\_array->reverseSortKeys()

#### $x\_array->humanSortValues()

#### $x\_array->iHumanSortValues()

#### $x\_array->lowerKeys()

#### $x\_array->upperKeys()

#### $x\_array->isSequential()

#### $x\_array->isAssociative()

#### $x\_array->looksSequential()

#### $x\_array->looksAssociative()

#### $x\_array->countValues()

### class Jitsu\\XRegex

An object-oriented wrapper for PHP's PCRE patterns.

See [jitsu/regex](https://github.com/bdusell/jitsu-regex).

#### new XRegex($arg, $flags = '', $start = null, $end = null)

|   | Type | Description |
|---|------|-------------|
| **`$arg`** | `string|\Jitsu\XString|self` | Either a PCRE pattern or another `XRegex`. |
| **`$flags`** | `string|\Jitsu\XString` | PCRE flags such as `i`, etc. |
| **`$start`** | `string|\Jitsu\XString|null` | Optional starting delimiter for the escaped PCRE pattern stored in `pattern`. This might simplify the escaped pattern if, for example, it is known that the regular expression contains a lot of slashes. |
| **`$start`** | `string|\Jitsu\XString|null` | Optional ending delimiter. Only necessary for bracket pairs. |

#### $x\_regex->\_\_toString()

#### $x\_regex->match($str, $offset = 0)

#### $x\_regex->matchWithOffsets($str, $offset = 0)

#### $x\_regex->matchAll($str, $offset = 0)

#### $x\_regex->matchAllWithOffsets($str, $offset = 0)

#### XRegex::escape($str, $delim = null)

#### $x\_regex->replace($str, $replacement, $limit = null)

#### $x\_regex->replaceAndCount($str, $replacement, $limit = null)

#### $x\_regex->replaceWith($str, $callback, $limit = null)

#### $x\_regex->replaceAndCountWith($str, $callback, $limit = null)

#### $x\_regex->replaceAndFilter($str, $replacement, $limit = null)

#### $x\_regex->replaceAndFilterAndCount($str, $replacement, $limit = null)

#### $x\_regex->grep($strs)

#### $x\_regex->invertedGrep($strs)

#### $x\_regex->split($str, $limit = null)

#### $x\_regex->splitWithOffsets($str, $limit = null)

#### $x\_regex->splitAndFilter($str, $limit = null)

#### $x\_regex->splitAndFilterWithOffsets($str, $limit = null)

#### $x\_regex->inclusiveSplit($str, $limit = null)

#### $x\_regex->inclusiveSplitWithOffsets($str, $limit = null)

