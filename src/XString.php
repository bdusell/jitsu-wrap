<?php

namespace Jitsu;

use Jitsu\StringUtil as s;

/**
 * An object-oriented wrapper for the `string` type.
 */
class XString {

	public $value;

	public function __construct($value = '') {
		$this->value = $value instanceof self ? $value->value : $value;
	}

	public function __toString() {
		return $this->value;
	}

	public static function unwrap($x) {
		return $x instanceof self ? $x->value : $x;
	}

	private static function _wrap($x) {
		return $x === null ? $x : new self($x);
	}

	public function length() {
		return s::length($this->value);
	}

	public function size() {
		return s::size($this->value);
	}

	public function isEmpty() {
		return s::isEmpty($this->value);
	}

	public function equal($that) {
		return s::equal($this->value, self::unwrap($that));
	}

	public function iEqual($that) {
		return s::iEqual($this->value, self::unwrap($that));
	}

	public function chars() {
		return new XArray(s::chars($this->value));
	}

	public function chunks($n) {
		return new XArray(s::chunks($this->value, $n));
	}

	public function split($delim = null, $limit = null) {
		return new XArray(s::split($this->value, self::unwrap($delim), $limit));
	}

	public function tokenize($chars) {
		return new XArray(s::tokenize($this->value, self::unwrap($chars)));
	}

	public function join($strs = null) {
		return new self(s::join($this->value, XArray::unwrap($strs)));
	}

	public function trim($chars = null) {
		return new self(s::trim($this->value, self::unwrap($chars)));
	}

	public function rtrim($chars = null) {
		return new self(s::rtrim($this->value, self::unwrap($chars)));
	}

	public function ltrim($chars = null) {
		return new self(s::ltrim($this->value, self::unwrap($chars)));
	}

	public function lower() {
		return new self(s::lower($this->value));
	}

	public function upper() {
		return new self(s::upper($this->value));
	}

	public function lcfirst() {
		return new self(s::lcfirst($this->value));
	}

	public function lowerFirst() {
		return new self(s::lowerFirst($this->value));
	}

	public function ucfirst() {
		return new self(s::ucfirst($this->value));
	}

	public function upperFirst() {
		return new self(s::upperFirst($this->value));
	}

	public function ucwords() {
		return new self(s::ucwords($this->value));
	}

	public function capitalize() {
		return new self(s::capitalize($this->value));
	}

	public function capitalizeWords() {
		return new self(s::capitalizeWords($this->value));
	}

	public function replace($old, $new) {
		return new self(s::replace($this->value, self::unwrap($old), self::unwrap($new)));
	}

	public function replaceAndCount($old, $new) {
		$r = s::replaceAndCount($this->value, self::unwrap($old), self::unwrap($new));
		$r[0] = new self($r[0]);
		return $r;
	}

	public function iReplace($old, $new) {
		return new self(s::replace($this->value, self::unwrap($old), self::unwrap($new)));
	}

	public function iReplaceAndCount($old, $new) {
		$r = s::iReplace($this->value, self::unwrap($old), self::unwrap($new));
		$r[0] = new self($r[0]);
		return $r;
	}

	public function replaceMultiple($pairs) {
		return new self(s::replaceMultiple($this->value, XArray::unwrap($pairs)));
	}

	public function translate($old, $new) {
		return new self(s::translate($this->value, self::unwrap($old), self::unwrap($new)));
	}

	public function substring($offset, $length = null) {
		return new self(s::substring($this->value, $offset, $length));
	}

	public function replaceSubstring($new, $offset, $length = null) {
		return new self(s::replaceSubstring($this->value, self::unwrap($new), $offset, $length));
	}

	public function slice($i, $j = null) {
		return new self(s::slice($this->value, $i, $j));
	}

	public function replaceSlice($new, $i, $j = null) {
		return new self(s::replaceSlice($this->value, self::unwrap($new), $i, $j));
	}

	public function insert($new, $offset) {
		return new self(s::insert($this->value, self::unwrap($new), $offset));
	}

	public function pad($n, $pad = ' ') {
		return new self(s::pad($this->value, $n, self::unwrap($pad)));
	}

	public function lpad($n, $pad = ' ') {
		return new self(s::lpad($this->value, $n, $pad));
	}

	public function rpad($n, $pad = ' ') {
		return new self(s::rpad($this->value, $n, $pad));
	}

	public function wrap($cols, $sep = "\n") {
		return new self(s::wrap($this->value, $cols, self::unwrap($sep)));
	}

	public function repeat($n) {
		return new self(s::repeat($this->value, $n));
	}

	public function reverse() {
		return new self(s::reverse($this->value));
	}

	public function startingWith($substr) {
		return self::_wrap(s::startingWith($this->value, self::unwrap($substr)));
	}

	public function iStartingWith($substr) {
		return self::_wrap(s::iStartingWith($this->value, self::unwrap($substr)));
	}

	public function rStartingWith($char) {
		return self::_wrap(s::rStartingWith($this->value, self::unwrap($char)));
	}

	public function startingWithChars($chars) {
		return self::_wrap(s::startingWithChars($this->value, self::unwrap($chars)));
	}

	public function preceding($substr) {
		return self::_wrap(s::preceding($this->value, self::unwrap($substr)));
	}

	public function iPreceding($substr) {
		return self::_wrap(s::iPreceding($this->value, self::unwrap($substr)));
	}

	public function words($chars = null) {
		return new XArray(s::words($this->value, self::unwrap($chars)));
	}

	public function wordCount($chars = null) {
		return s::wordCount($this->value, self::unwrap($chars));
	}

	public function findWords($chars = null) {
		return new XArray(s::findWords($this->value, self::unwrap($chars)));
	}

	public function wordWrap($width, $sep = "\n") {
		return new self(s::wordWrap($this->value, $width, self::unwrap($sep)));
	}

	public function compare($that) {
		return s::compare($this->value, self::unwrap($that));
	}

	public function iCompare($that) {
		return s::iCompare($this->value, self::unwrap($that));
	}

	public function nCompare($that, $n) {
		return s::nCompare($this->value, self::unwrap($that), $n);
	}

	public function inCompare($that, $n) {
		return s::inCompare($this->value, self::unwrap($that), $n);
	}

	public function localeCompare($that) {
		return s::localeCompare($this->value, self::unwrap($that));
	}

	public function humanCompare($that) {
		return s::humanCompare($this->value, self::unwrap($that));
	}

	public function iHumanCompare($that) {
		return s::iHumanCompare($this->value, self::unwrap($that));
	}

	public function substringCompare($that, $offset, $length) {
		return s::substringCompare($this->value, self::unwrap($that), $offset, $length);
	}

	public function iSubstringCompare($that, $offset, $length) {
		return s::iSubstringCompare($this->value, self::unwrap($that), $offset, $length);
	}

	public function contains($substr, $offset = 0) {
		return s::contains($this->value, self::unwrap($substr), $offset);
	}

	public function iContains($substr, $offset = 0) {
		return s::iContains($this->value, self::unwrap($substr), $offset);
	}

	public function containsChars($chars) {
		return s::containsChars($this->value, self::unwrap($chars));
	}

	public function containsChar($char) {
		return s::containsChar($this->value, self::unwrap($char));
	}

	public function beginsWith($prefix) {
		return s::beginsWith($this->value, self::unwrap($prefix));
	}

	public function iBeginsWith($prefix) {
		return s::iBeginsWith($this->value, self::unwrap($prefix));
	}

	public function endsWith($suffix) {
		return s::endsWith($this->value, self::unwrap($suffix));
	}

	public function iEndsWith($suffix) {
		return s::iEndsWith($this->value, self::unwrap($suffix));
	}

	public function removePrefix($prefix) {
		return self::_wrap(s::removePrefix($this->value, self::unwrap($prefix)));
	}

	public function iRemovePrefix($prefix) {
		return self::_wrap(s::iRemovePrefix($this->value, self::unwrap($prefix)));
	}

	public function removeSuffix($suffix) {
		return self::_wrap(s::removeSuffix($this->value, self::unwrap($suffix)));
	}

	public function iRemoveSuffix($suffix) {
		return self::_wrap(s::iRemoveSuffix($this->value, self::unwrap($suffix)));
	}

	public function find($substr, $offset = 0) {
		return s::find($this->value, self::unwrap($substr), $offset);
	}

	public function iFind($substr, $offset = 0) {
		return s::iFind($this->value, self::unwrap($substr), $offset);
	}

	public function rFind($substr, $offset = 0) {
		return s::rFind($this->value, self::unwrap($substr), $offset);
	}

	public function before($substr) {
		return new self(s::before($this->value, self::unwrap($substr)));
	}

	public function after($substr) {
		return new self(s::after($this->value, self::unwrap($substr)));
	}

	public function isLower() {
		return s::isLower($this->value);
	}

	public function isUpper() {
		return s::isUpper($this->value);
	}

	public function isAlphanumeric() {
		return s::isAlphanumeric($this->value);
	}

	public function isAlphabetic() {
		return s::isAlphabetic($this->value);
	}

	public function isControl() {
		return s::isControl($this->value);
	}

	public function isDecimal() {
		return s::isDecimal($this->value);
	}

	public function isHex() {
		return s::isHex($this->value);
	}

	public function isVisible() {
		return s::isVisible($this->value);
	}

	public function isPrintable() {
		return s::isPrintable($this->value);
	}

	public function isPunctuation() {
		return s::isPunctuation($this->value);
	}

	public function isWhitespace() {
		return s::isWhitespace($this->value);
	}

	public function count($substr, $offset = 0, $length = null) {
		return s::count($this->value, self::unwrap($substr), $offset, $length);
	}

	public function characterRun($chars, $begin = 0, $end = null) {
		return s::characterRun($this->value, self::unwrap($chars), $begin, $end);
	}

	public function escapeCString() {
		return new self(s::escapeCString($this->value));
	}

	public function unescapeCString() {
		return new self(s::unescapeCString($this->value));
	}

	public function escapePhpString() {
		return new self(s::escapePhpString($this->value));
	}

	public function unescapeBackslashes() {
		return new self(s::unescapeBackslashes($this->value));
	}

	public function parseInt($base = null) {
		return s::parseInt($this->value, $base);
	}

	public function parseReal() {
		return s::parseReal($this->value);
	}

	public function encodeHex() {
		return new self(s::encodeHex($this->value));
	}

	public function decodeHex() {
		return new self(s::decodeHex($this->value));
	}

	public function encodeBase64() {
		return new self(s::encodeBase64($this->value));
	}

	public function decodeBase64() {
		return new self(s::decodeBase64($this->value));
	}

	public static function fromAscii($n) {
		return new self(s::fromAscii($n));
	}

	public static function chr($n) {
		return new self(s::chr($n));
	}

	public function toAscii() {
		return s::toAscii($this->value);
	}

	public function ord() {
		return s::ord($this->value);
	}

	public function byteCounts() {
		return new XArray(s::byteCounts($this->value));
	}

	public function unique() {
		return new self(s::unique($this->value));
	}

	public function unusedBytes() {
		return new self(s::unusedBytes($this->value));
	}

	public function encodeHtml($noquote = false) {
		return new self(s::encodeHtml($this->value, $noquote));
	}

	public function escapeHtml($noquote = false) {
		return new self(s::escapeHtml($this->value, $noquote));
	}

	public function unencodeHtml() {
		return new self(s::unencodeHtml($this->value));
	}

	public static function encodeHtmlDict($noquote = false) {
		return new XArray(s::encodeHtmlDict($noquote));
	}

	public function encodeHtmlEntities() {
		return new self(s::encodeHtmlEntities($this->value));
	}

	public static function encodeHtmlEntitiesDict() {
		return new XArray(s::encodeHtmlEntitiesDict());
	}

	public function stripTags() {
		return new self(s::stripTags($this->value));
	}

	public function parseRawQueryString() {
		return new XArray(s::parseRawQueryString($this->value));
	}

	public static function encodeStandardQueryString($data, $sep = '&') {
		return new self(s::encodeStandardQueryString(XArray::unwrap($data), self::unwrap($sep)));
	}

	public static function encodeQueryString($data, $sep = '&') {
		return new self(s::encodeQueryString(XArray::unwrap($data), self::unwrap($sep)));
	}

	public function encodeStandardUrl() {
		return new self(s::encodeStandardUrl($this->value));
	}

	public function decodeStandardUrl() {
		return new self(s::decodeStandardUrl($this->value));
	}

	public function encodeUrl() {
		return new self(s::encodeUrl($this->value));
	}

	public function decodeUrl() {
		return new self(s::decodeUrl($this->value));
	}

	public function parseCsv($delim = ',', $quote = '"', $escape = '\\') {
		return new XArray(s::parseCsv($this->value, self::unwrap($delim), self::unwrap($quote), self::unwrap($escape)));
	}

	public function md5() {
		return new self(s::md5($this->value));
	}

	public function md5Hex() {
		return new self(s::md5Hex($this->value));
	}

	public function sha1() {
		return new self(s::sha1($this->value));
	}

	public function sha1Hex() {
		return new self(s::sha1Hex($this->value));
	}

	public function rot13() {
		return new self(s::rot13($this->value));
	}

	public function shuffle() {
		return new self(s::shuffle($this->value));
	}

	public function formatMoney() {
		return new self(s::formatMoney($this->value));
	}

	public static function formatNumber($number, $decimals = 0, $decimal_point = '.', $thousands_sep = ',') {
		return new self(s::formatNumber($number, $decimals, self::unwrap($decimal_point), self::unwrap($this->thousands_sep)));
	}

	public function levenshtein($that, $ins = null, $repl = null, $del = null) {
		return s::levenshtein($this->value, $that, $ins, $repl, $del);
	}

	public function splitCamelCase() {
		return new XArray(s::splitCamelCase($this->value));
	}

	public function pluralize() {
		return new self(s::pluralize($this->value));
	}

	public static function capture($callback) {
		return new self(s::capture($callback));
	}
}
