<?php

/**
 * An object-oriented wrapper class for the `array` type.
 */

namespace Jitsu;

use Jitsu\ArrayUtil as a;
use Jitsu\StringUtil as s;

/**
 * An object-oriented wrapper class for the `array` type.
 */
class XArray implements \Countable, \IteratorAggregate, \ArrayAccess {

	/**
	 * @var array The underlying array.
	 */
	public $value;

	/**
	 * @param $value array|self
	 */
	public function __construct($value = array()) {
		$this->value = $value instanceof self ? $value->value : $value;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return implode(', ', $this->value);
	}

	// interface Countable
	public function count() {
		return count($this->value);
	}

	// interface IteratorAggregate
	public function getIterator() {
		return new ArrayIterator($this->value);
	}

	// interface ArrayAccess
	public function offsetExists($offset) {
		return isset($this->value[$offset]);
	}

	// interface ArrayAccess
	public function offsetGet($offset) {
		return $this->value[$offset];
	}

	// interface ArrayAccess
	public function offsetSet($offset, $value) {
		if($offset === null) $this->value[] = $value;
		else $this->value[$offset] = $value;
	}

	// interface ArrayAccess
	public function offsetUnset($offset) {
		unset($this->value[$offset]);
	}

	public static function unwrap($x) {
		return $x instanceof self ? $x->value : $x;
	}

	public function join($str = '') {
		return new XString(s::join(s::unwrap($str), $this->value));
	}

	public function size() {
		return a::size($this->value);
	}

	public function length() {
		return a::length($this->value);
	}

	public function isEmpty() {
		return a::isEmpty($this->value);
	}

	public function get($key, $default = null) {
		return a::get($this->value, s::unwrap($key), $default);
	}

	public function getRef($key, $default = null) {
		return a::getRef($this->value, s::unwrap($key), $default);
	}

	public function hasKey($key) {
		return a::hasKey($this->value, s::unwrap($key));
	}

	public static function normalizeKey($k) {
		return a::normalizeKey(s::unwrap($k));
	}

	public function remove($key) {
		a::remove($this->value, s::unwrap($key));
		return $this;
	}

	public function keys() {
		return new self(a::keys($this->value));
	}

	public function values() {
		return new self(a::values($this->value));
	}

	public function listValues($keys, $default = null) {
		return new self(a::listValues($this->value, $keys, $default));
	}

	public function requireValues($keys) {
		return new self(a::requireValues($this->value, $keys));
	}

	public function append($value) {
		a::append($this->value, $value);
		return $this;
	}

	public function appendMany($values) {
		a::appendMany($this->value, $values);
		return $this;
	}

	public function concat($array) {
		return new self(a::concat($this->value, self::unwrap($array)));
	}

	public function push($value) {
		a::push($this->value, $value);
		return $this;
	}

	public function pop() {
		return a::pop($this->value);
	}

	public function shift() {
		return a::shift($this->value);
	}

	public function unshift($value) {
		a::unshift($this->value, $value);
		return $this;
	}

	public function keyOf($value) {
		return a::keyOf($this->value, $value);
	}

	public function indexOf($value) {
		return a::indexOf($this->value, $value);
	}

	public function keysOf($value) {
		return new self(a::keysOf($this->value, $value));
	}

	public function contains($value) {
		return a::contains($this->value, $value);
	}

	public function at($i) {
		return a::at($this->value, $i);
	}

	public function pairAt($i) {
		return a::pairAt($this->value, $i);
	}

	public function keyAt($i) {
		return a::keyAt($this->value, $i);
	}

	public function slice($i, $j = null) {
		return new self(a::slice($this->value, $i, $j));
	}

	public function pairSlice($i, $j = null) {
		return new self(a::pairSlice($this->value, $i, $j));
	}

	public function assignSlice($sub, $i, $j = null) {
		return new self(a::assignSlice($this->value, self::unwrap($sub), $i, $j));
	}

	public function removeSlice($i, $j = null) {
		return new self(a::removeSlice($this->value, $i, $j));
	}

	public function reverse() {
		return new self(a::reverse($this->value));
	}

	public function reversePairs() {
		return new self(a::reversePairs($this->value));
	}

	public static function range($i, $j = null, $step = 1) {
		return new self(a::range($i, $j, $step));
	}

	public static function fromPairs($pairs) {
		return new self(a::fromPairs(self::unwrap($pairs)));
	}

	public static function fromLists($keys, $values) {
		return new self(a::fromLists(self::unwrap($keys), self::unwrap($values)));
	}

	public function toSet($value = true) {
		return new self(a::toSet($this->value, $value));
	}

	public static function fill($value, $n) {
		return new self(a::fill($value, $n));
	}

	public function pad($value, $n) {
		return new self(a::pad($value, $n));
	}

	public function pluck($key) {
		return new self(a::pluck($this->value, $key));
	}

	public function pick($keys) {
		return new self(a::pick($this->value, self::unwrap($keys)));
	}

	public function getPick($keys, $default = null) {
		return new self(a::getPick($this->value, self::unwrap($keys), $default));
	}

	public function invert() {
		return new self(a::invert($this->value));
	}

	public function extend($array) {
		return new self(a::extend($this->value, self::unwrap($array)));
	}

	public function deepExtend($array) {
		return new self(a::deepExtend($this->value, self::unwrap($array)));
	}

	public function chunks($n) {
		return new self(a::chunks($this->value, $n));
	}

	public function map($callback) {
		return new self(a::map($this->value, $callback));
	}

	public function filter($callback = null) {
		return new self(a::filter($this->value, $callback));
	}

	public function filterPairs($callback) {
		return new self(a::filterPairs($this->value, $callback));
	}

	public function sum() {
		return a::sum($this->value);
	}

	public function product() {
		return a::product($this->value);
	}

	public function reduce($callback, $initial = null) {
		return a::reduce($this->value, $callback, $initial);
	}

	public function apply($callback) {
		a::apply($this->value, $callback);
		return $this;
	}

	public function traverseLeaves($callback) {
		a::traverseLeaves($this->value, $callback);
		return $this;
	}

	public function difference($array, $key_cmp = null, $value_cmp = true) {
		return new self(a::difference($this->value, self::unwrap($array), $key_cmp, $value_cmp));
	}

	public function pairDifference($array, $key_cmp = null, $value_cmp = null) {
		return new self(a::pairDifference($this->value, self::unwrap($array), $key_cmp, $value_cmp));
	}

	public function keyDifference($array, $key_cmp = null) {
		return new self(a::keyDifference($this->value, self::unwrap($array), $key_cmp));
	}

	public function valueDifference($array, $value_cmp = null) {
		return new self(a::valueDifference($this->value, self::unwrap($array), $value_cmp));
	}

	public function pairIntersection($array, $key_cmp = null, $value_cmp = null) {
		return new self(a::pairIntersection($this->value, self::unwrap($array), $key_cmp, $value_cmp));
	}

	public function keyIntersection($array, $key_cmp = null) {
		return new self(a::keyIntersection($this->value, self::unwrap($array), $key_cmp));
	}

	public function valueIntersection($array, $value_cmp = null) {
		return new self(a::valueIntersection($this->value, self::unwrap($array), $value_cmp));
	}

	public function uniqueValues() {
		return new self(a::uniqueValues($this->value));
	}

	public function hasOnlyKeys($keys, &$unexpected = null) {
		if(func_num_args() > 1) {
			$r = a::hasOnlyKeys(self::unwrap($keys), $unexpected);
			$unexpected = new self($unexpected);
			return $r;
		} else {
			return a::hasOnlyKeys(self::unwrap($keys));
		}
	}

	public function hasKeys($keys, &$missing = null) {
		if(func_num_args() > 1) {
			$r = a::hasKeys(self::unwrap($keys), $missing);
			$missing = new self($missing);
			return $r;
		} else {
			return a::hasKeys(self::unwrap($keys));
		}
	}

	public function hasExactKeys($keys, &$unexpected = null, &$missing = null) {
		if(func_num_args() > 1) {
			$r = a::hasExactKeys(self::unwrap($keys), $unexpected, $missing);
			$unexpected = new self($unexpected);
			$missing = new self($missing);
			return $r;
		} else {
			return a::hasExactKeys(self::unwrap($keys));
		}
	}

	public function randomKey() {
		return a::randomKey($this->value);
	}

	public function randomValue() {
		return a::randomValue($this->value);
	}

	public function randomPair() {
		return a::randomPair($this->value);
	}

	public function randomKeys($n) {
		return new self(a::randomKeys($this->value, $n));
	}

	public function shuffle() {
		a::shuffle($this->value);
		return $this;
	}

	public function sort($value_cmp = null) {
		a::sort($this->value, $value_cmp);
		return $this;
	}

	public function reverseSort() {
		a::reverseSort($this->value);
		return $this;
	}

	public function localeSort() {
		a::localeSort($this->value);
		return $this;
	}

	public function sortPairs($value_cmp = null) {
		a::sortPairs($this->value);
		return $this;
	}

	public function reverseSortPairs() {
		a::reverseSortPairs($this->value);
		return $this;
	}

	public function sortKeys($key_cmp = null) {
		a::sortKeys($this->value);
		return $this;
	}

	public function reverseSortKeys() {
		a::reverseSortKeys($this->value);
		return $this;
	}

	public function humanSortValues() {
		a::humanSortValues($this->value);
		return $this;
	}

	public function iHumanSortValues() {
		a::iHumanSortValues($this->value);
		return $this;
	}

	public function lowerKeys() {
		return new self(a::lowerKeys($this->value));
	}

	public function upperKeys() {
		return new self(a::upperKeys($this->value));
	}

	public function isSequential() {
		return a::isSequential($this->value);
	}

	public function isAssociative() {
		return a::isAssociative($this->value);
	}

	public function looksSequential() {
		return a::looksSequential($this->value);
	}

	public function looksAssociative() {
		return a::looksAssociative($this->value);
	}

	public function countValues() {
		return new self(a::countValues($this->value));
	}
}
