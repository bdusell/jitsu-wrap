<?php

namespace Jitsu;

use Jitsu\RegexUtil as r;

/**
 * An object-oriented wrapper for PHP's PCRE patterns.
 */
class XRegex {

	/**
	 * @var string The underlying PCRE pattern.
	 */
	public $pattern;

	/**
	 * @var int|null The number of replacements for the most recent
	 *               replacement operation.
	 */
	public $count;

	/**
	 * @var int[]|null The offsets corresponding to the most recent split
	 *                 operation.
	 */
	public $offsets;

	public function __construct($arg, $flags = '', $start = null, $end = null) {
		$this->pattern = (
			$arg instanceof self ?
			$arg->pattern :
			RegexUtil::create(
				XString::unwrap($arg),
				XString::unwrap($flags),
				XString::unwrap($start),
				XString::unwrap($end)
			)
		);
	}

	public function __toString() {
		return $this->pattern;
	}

	public function match($str, $offset = 0) {
		return r::match($this->pattern, XString::unwrap($str), $offset);
	}

	public function matchWithOffsets($str, $offset = 0) {
		return r::matchWithOffsets($this->pattern, XString::unwrap($str), $offset);
	}

	public function matchAll($str, $offset = 0) {
		return new XArray(r::matchAll($this->pattern, XString::unwrap($str), $offset));
	}

	public function matchAllWithOffsets($str, $offset = 0) {
		return new XArray(r::matchAllWithOffsets($this->pattern, XString::unwrap($str), $offset));
	}

	public static function escape($str, $delim = null) {
		return r::escape(XString::unwrap($str), XString::unwrap($delim));
	}

	public function replace($str, $replacement, $limit = null) {
		return self::wrapBoth(r::replace($this->pattern, self::unwrapBoth($str), self::unwrapBoth($replacement), $limit));
	}

	public function replaceAndCount($str, $replacement, $limit = null) {
		return $this->_wrapCount(r::replaceAndCount($this->pattern, self::unwrapBoth($str), self::unwrapBoth($replacement), $limit));
	}

	public function replaceWith($str, $callback, $limit = null) {
		return self::wrapBoth(r::replaceWith($this->pattern, self::unwrapBoth($str), $callback, $limit));
	}

	public function replaceAndCountWith($str, $callback, $limit = null) {
		return $this->wrapCount(r::replaceAndCountWith($this->pattern, self::unwrapBoth($str), $callback, $limit));
	}

	public function replaceAndFilter($str, $replacement, $limit = null) {
		return self::wrapBoth(r::replaceAndFilter($this->pattern, self::unwrapBoth($str), self::unwrapBoth($replacement), $limit));
	}

	public function replaceAndFilterAndCount($str, $replacement, $limit = null) {
		return $this->_wrapCount(r::replaceAndFilterAndCount($this->pattern, self::unwrapBoth($str), self::unwrapBoth($replacement), $limit));
	}

	public function grep($strs) {
		return new XArray(r::grep($this->pattern, XArray::unwrap($strs)));
	}

	public function invertedGrep($strs) {
		return new XArray(r::invertedGrep($this->pattern, XArray::unwrap($strs)));
	}

	public function split($str, $limit = null) {
		return new XArray(r::split($this->pattern, XString::unwrap($str), $limit));
	}

	public function splitWithOffsets($str, $limit = null) {
		return $this->_wrapOffsets(r::splitWithOffsets($this->pattern, XString::unwrap($str), $limit));
	}

	public function splitAndFilter($str, $limit = null) {
		return new XArray(r::splitAndFilter($this->pattern, XString::unwrap($str), $limit));
	}

	public function splitAndFilterWithOffsets($str, $limit = null) {
		return $this->_wrapOffsets(r::splitAndFilterWithOffsets($this->pattern, XString::unwrap($str), $limit));
	}

	public function inclusiveSplit($str, $limit = null) {
		return new XArray(r::inclusiveSplit($this->pattern, XString::unwrap($str), $limit));
	}

	public function inclusiveSplitWithOffsets($str, $limit = null) {
		return $this->_wrapOffsets(r::inclusiveSplitWithOffsets($this->pattern, XString::unwrap($str), $limit));
	}

	private static function unwrapBoth($x) {
		return $x instanceof XArray || $x instanceof XString ? $x->value : $x;
	}

	private static function wrapBoth($x) {
		return is_array($x) ? new XArray($x) : new XString($x);
	}

	private function _wrapCount($x) {
		list($r, $this->count) = $x;
		return self::wrapBoth($r);
	}

	private function _wrapOffsets($x) {
		list($r, $this->offsets) = $x;
		return new XArray($r);
	}
}
