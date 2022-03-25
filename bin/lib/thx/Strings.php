<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \php\Boot;
use \thx\_Ord\Ord_Impl_;
use \php\_Boot\HxString;
use \haxe\crypto\Base64;
use \haxe\_Int32\Int32_Impl_;
use \haxe\iterators\ArrayIterator;

/**
 * Extension methods for strings.
 */
class Strings {
	/**
	 * @var \EReg
	 */
	static public $CANONICALIZE_LINES;
	/**
	 * @var int
	 */
	static public $HASCODE_MAX;
	/**
	 * @var int
	 */
	static public $HASCODE_MUL;
	/**
	 * @var \EReg
	 */
	static public $IS_ALPHA;
	/**
	 * @var \EReg
	 */
	static public $IS_BREAKINGWHITESPACE;
	/**
	 * @var \EReg
	 */
	static public $SPLIT_LINES;
	/**
	 * @var \EReg
	 */
	static public $UCWORDS;
	/**
	 * @var \EReg
	 */
	static public $WSG;
	/**
	 * @var object
	 */
	static public $monoid;
	/**
	 * @var \Closure
	 */
	static public $order;

	/**
	 * `after` searches for the first occurrance of `searchFor` and returns the text after that.
	 * If `searchFor` is not found, an empty string is returned.
	 * 
	 * @param string $value
	 * @param string $searchFor
	 * 
	 * @return string
	 */
	public static function after ($value, $searchFor) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:21: characters 3-38
		$pos = HxString::indexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:22: lines 22-25
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:23: characters 4-13
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:25: characters 4-50
			return HxString::substring($value, $pos + mb_strlen($searchFor));
		}
	}

	/**
	 * `afterLast` searches for the last occurrance of `searchFor` and returns the text after that.
	 * If `searchFor` is not found, an empty string is returned.
	 * 
	 * @param string $value
	 * @param string $searchFor
	 * 
	 * @return string
	 */
	public static function afterLast ($value, $searchFor) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:34: characters 3-42
		$pos = HxString::lastIndexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:35: lines 35-38
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:36: characters 4-13
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:38: characters 4-50
			return HxString::substring($value, $pos + mb_strlen($searchFor));
		}
	}

	/**
	 * `before` searches for the first occurrance of `searchFor` and returns the text before that.
	 * If `searchFor` is not found, an empty string is returned.
	 * 
	 * @param string $value
	 * @param string $searchFor
	 * 
	 * @return string
	 */
	public static function before ($value, $searchFor) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:47: characters 3-38
		$pos = HxString::indexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:48: lines 48-51
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:49: characters 4-13
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:51: characters 4-34
			return HxString::substring($value, 0, $pos);
		}
	}

	/**
	 * `beforeLast` searches for the last occurrance of `searchFor` and returns the text before that.
	 * If `searchFor` is not found, an empty string is returned.
	 * 
	 * @param string $value
	 * @param string $searchFor
	 * 
	 * @return string
	 */
	public static function beforeLast ($value, $searchFor) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:60: characters 3-42
		$pos = HxString::lastIndexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:61: lines 61-64
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:62: characters 4-13
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:64: characters 4-34
			return HxString::substring($value, 0, $pos);
		}
	}

	/**
	 * Replaces occurrances of `\r\n`, `\n\r`, `\r` with `\n`;
	 * 
	 * @param string $value
	 * 
	 * @return string
	 */
	public static function canonicalizeNewlines ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:97: characters 3-49
		return Strings::$CANONICALIZE_LINES->replace($value, "\x0A");
	}

	/**
	 * `capitalize` returns a string with the first character convert to upper case.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function capitalize ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:72: characters 3-52
		return (\mb_strtoupper(\mb_substr($s, 0, 1))??'null') . (\mb_substr($s, 1, null)??'null');
	}

	/**
	 * Capitalize the first letter of every word in `value`. If `whiteSpaceOnly` is set to `true`
	 * the process is limited to whitespace separated words.
	 * 
	 * @param string $value
	 * @param bool $whiteSpaceOnly
	 * 
	 * @return string
	 */
	public static function capitalizeWords ($value, $whiteSpaceOnly = false) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:80: lines 80-90
		if ($whiteSpaceOnly === null) {
			$whiteSpaceOnly = false;
		}
		if ($whiteSpaceOnly) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:82: characters 4-36
			return \ucwords($value);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:89: characters 4-53
			return Strings::$UCWORDS->map((\mb_strtoupper(\mb_substr($value, 0, 1))??'null') . (\mb_substr($value, 1, null)??'null'), Boot::getStaticClosure(Strings::class, 'upperMatch'));
		}
	}

	/**
	 * Compares two strings ignoring their case.
	 * 
	 * @param string $a
	 * @param string $b
	 * 
	 * @return int
	 */
	public static function caseInsensitiveCompare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:103: lines 103-104
		if ((null === $a) && (null === $b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:104: characters 4-12
			return 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:105: lines 105-108
		if (null === $a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:106: characters 4-13
			return -1;
		} else if (null === $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:108: characters 4-12
			return 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:109: characters 10-51
		$a1 = \mb_strtolower($a);
		$b1 = \mb_strtolower($b);
		if (strcmp($a1, $b1) < 0) {
			return -1;
		} else if (strcmp($a1, $b1) > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * `contains` returns `true` if `s` contains one or more occurrences of `test` regardless of the text case.
	 * 
	 * @param string $s
	 * @param string $test
	 * 
	 * @return bool
	 */
	public static function caseInsensitiveContains ($s, $test) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:161: characters 10-72
		if ($test !== "") {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:161: characters 24-72
			return HxString::indexOf(\mb_strtolower($s), \mb_strtolower($test)) >= 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:161: characters 10-72
			return true;
		}
	}

	/**
	 * `contains` returns `true` if `s` contains all of the strings in `tests` regardless of the text case
	 * 
	 * @param string $s
	 * @param string[]|\Array_hx $tests
	 * 
	 * @return bool
	 */
	public static function caseInsensitiveContainsAll ($s, $tests) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:198: characters 49-50
		$s1 = $s;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:198: characters 3-55
		return Arrays::all($tests, function ($test) use (&$s1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:198: characters 20-48
			if ($test !== "") {
				return HxString::indexOf(\mb_strtolower($s1), \mb_strtolower($test)) >= 0;
			} else {
				return true;
			}
		});
	}

	/**
	 * `contains` returns `true` if `s` contains any of the strings in `tests` regardless of the text case
	 * 
	 * @param string $s
	 * @param string[]|\Array_hx $tests
	 * 
	 * @return bool
	 */
	public static function caseInsensitiveContainsAny ($s, $tests) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:186: characters 49-50
		$s1 = $s;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:186: characters 3-55
		return Arrays::any($tests, function ($test) use (&$s1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:186: characters 20-48
			if ($test !== "") {
				return HxString::indexOf(\mb_strtolower($s1), \mb_strtolower($test)) >= 0;
			} else {
				return true;
			}
		});
	}

	/**
	 * Returns true if `s` ends with `end` ignoring their case.
	 * 
	 * @param string $s
	 * @param string $end
	 * 
	 * @return bool
	 */
	public static function caseInsensitiveEndsWith ($s, $end) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:116: characters 3-66
		return \StringTools::endsWith(\mb_strtolower($s), \mb_strtolower($end));
	}

	/**
	 * Compares a string `s` with many `values` and see if one of them matches its end ignoring their case.
	 * 
	 * @param string $s
	 * @param string[]|\Array_hx $values
	 * 
	 * @return bool
	 */
	public static function caseInsensitiveEndsWithAny ($s, $values) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:122: characters 22-37
		$tmp = \mb_strtolower($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:122: characters 39-85
		$result = [];
		$data = $values->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \mb_strtolower($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:122: characters 3-86
		return Strings::endsWithAny($tmp, \Array_hx::wrap($result));
	}

	/**
	 * Compares two strings ignoring their case.
	 * 
	 * @param string $s
	 * @param string $start
	 * 
	 * @return bool
	 */
	public static function caseInsensitiveStartsWith ($s, $start) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:128: characters 3-70
		return \StringTools::startsWith(\mb_strtolower($s), \mb_strtolower($start));
	}

	/**
	 * Compares a string `s` with many `values` and see if one of them matches its beginning ignoring their case.
	 * 
	 * @param string $s
	 * @param string[]|\Array_hx $values
	 * 
	 * @return bool
	 */
	public static function caseInsensitiveStartsWithAny ($s, $values) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:134: characters 24-39
		$tmp = \mb_strtolower($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:134: characters 41-87
		$result = [];
		$data = $values->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \mb_strtolower($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:134: characters 3-88
		return Strings::startsWithAny($tmp, \Array_hx::wrap($result));
	}

	/**
	 * It cleans up all the whitespaces in the passed `value`. `collapse` does the following:
	 * - remove trailing/leading whitespaces
	 * - within the string, it collapses seqeunces of whitespaces into a single space character
	 * For whitespaces in this description, it is intended to be anything that is matched by the regular expression `\s`.
	 * 
	 * @param string $value
	 * 
	 * @return string
	 */
	public static function collapse ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:145: characters 3-51
		return Strings::$WSG->replace(\trim($value), " ");
	}

	/**
	 * It compares to string and it returns a negative number if `a` is inferior to `b`, zero if they are the same,
	 * or otherwise a positive non-sero number.
	 * 
	 * @param string $a
	 * @param string $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:152: characters 10-38
		if (strcmp($a, $b) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:152: characters 18-20
			return -1;
		} else if (strcmp($a, $b) > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:152: characters 32-33
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:152: characters 36-37
			return 0;
		}
	}

	/**
	 * `contains` returns `true` if `s` contains one or more occurrences of `test`.
	 * 
	 * @param string $s
	 * @param string $test
	 * 
	 * @return bool
	 */
	public static function contains ($s, $test) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:171: characters 10-44
		if ($test !== "") {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:171: characters 24-44
			return HxString::indexOf($s, $test) >= 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:171: characters 10-44
			return true;
		}
	}

	/**
	 * `contains` returns `true` if `s` contains all of the strings in `tests`
	 * 
	 * @param string $s
	 * @param string[]|\Array_hx $tests
	 * 
	 * @return bool
	 */
	public static function containsAll ($s, $tests) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:204: characters 34-35
		$s1 = $s;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:204: characters 3-40
		return Arrays::all($tests, function ($test) use (&$s1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:204: characters 20-33
			if ($test !== "") {
				return HxString::indexOf($s1, $test) >= 0;
			} else {
				return true;
			}
		});
	}

	/**
	 * `contains` returns `true` if `s` contains any of the strings in `tests`
	 * 
	 * @param string $s
	 * @param string[]|\Array_hx $tests
	 * 
	 * @return bool
	 */
	public static function containsAny ($s, $tests) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:192: characters 34-35
		$s1 = $s;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:192: characters 3-40
		return Arrays::any($tests, function ($test) use (&$s1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:192: characters 20-33
			if ($test !== "") {
				return HxString::indexOf($s1, $test) >= 0;
			} else {
				return true;
			}
		});
	}

	/**
	 * Return the number of occurances of `test` in `s`.
	 * 
	 * @param string $s
	 * @param string $test
	 * 
	 * @return int
	 */
	public static function count ($s, $test) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:180: characters 3-34
		return HxString::split($s, $test)->length - 1;
	}

	/**
	 * `dasherize` replaces all the occurrances of `_` with `-`;
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function dasherize ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:210: characters 3-29
		return \StringTools::replace($s, "_", "-");
	}

	/**
	 * Compares strings `a` and `b` and returns the position where they differ.
	 * ```haxe
	 * Strings.diffAt("abcdef", "abc123"); // returns 3
	 * ```
	 * 
	 * @param string $a
	 * @param string $b
	 * 
	 * @return int
	 */
	public static function diffAt ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:220: characters 13-41
		$a1 = mb_strlen($a);
		$b1 = mb_strlen($b);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:220: characters 3-42
		$min = ($a1 < $b1 ? $a1 : $b1);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:221: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:221: characters 17-20
		$_g1 = $min;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:221: lines 221-223
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:221: characters 13-20
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:222: lines 222-223
			if (HxString::substring($a, $i, $i + 1) !== HxString::substring($b, $i, $i + 1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:223: characters 5-13
				return $i;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:224: characters 3-13
		return $min;
	}

	/**
	 * `ellipsis` truncates `s` at len `maxlen` replaces the last characters with the content
	 * of `symbol`.
	 * ```haxe
	 * 'thx is a nice library'.ellipsis(8); // returns 'thx is …'
	 * ```
	 * 
	 * @param string $s
	 * @param int $maxlen
	 * @param string $symbol
	 * 
	 * @return string
	 */
	public static function ellipsis ($s, $maxlen = 20, $symbol = "…") {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:235: lines 235-247
		if ($maxlen === null) {
			$maxlen = 20;
		}
		if ($symbol === null) {
			$symbol = "…";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:238: characters 3-46
		$sl = mb_strlen($s);
		$symboll = mb_strlen($symbol);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:239: lines 239-246
		if ($sl > $maxlen) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:240: lines 240-244
			if ($maxlen < $symboll) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:241: characters 5-51
				return \mb_substr($symbol, $symboll - $maxlen, $maxlen);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:243: characters 5-50
				return (\mb_substr($s, 0, $maxlen - $symboll)??'null') . ($symbol??'null');
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:246: characters 4-12
			return $s;
		}
	}

	/**
	 * Same as `ellipsis` but puts the symbol in the middle of the string and not to the end.
	 * ```haxe
	 * 'thx is a nice library'.ellipsisMiddle(16); // returns 'thx is … library'
	 * ```
	 * 
	 * @param string $s
	 * @param int $maxlen
	 * @param string $symbol
	 * 
	 * @return string
	 */
	public static function ellipsisMiddle ($s, $maxlen = 20, $symbol = "…") {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:256: lines 256-269
		if ($maxlen === null) {
			$maxlen = 20;
		}
		if ($symbol === null) {
			$symbol = "…";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:259: characters 3-46
		$sl = mb_strlen($s);
		$symboll = mb_strlen($symbol);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:260: lines 260-268
		if ($sl > $maxlen) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:261: lines 261-263
			if ($maxlen <= $symboll) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:262: characters 5-39
				return Strings::ellipsis($s, $maxlen, $symbol);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:264: lines 264-265
			$hll = (int)(\ceil(($maxlen - $symboll) / 2));
			$hlr = (int)(\floor(($maxlen - $symboll) / 2));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:266: characters 4-62
			return (\mb_substr($s, 0, $hll)??'null') . ($symbol??'null') . (\mb_substr($s, $sl - $hlr, $hlr)??'null');
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:268: characters 4-12
			return $s;
		}
	}

	/**
	 * Returns `true` if `s` ends with any of the values in `values`.
	 * 
	 * @param string $s
	 * @param object $values
	 * 
	 * @return bool
	 */
	public static function endsWithAny ($s, $values) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:275: characters 3-69
		return Iterables::any($values, function ($end) use (&$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:275: characters 46-68
			return \StringTools::endsWith($s, $end);
		});
	}

	/**
	 * `filter` applies `predicate` character by character to `s` and it returns a filtered
	 * version of the string.
	 * 
	 * @param string $s
	 * @param \Closure $predicate
	 * 
	 * @return string
	 */
	public static function filter ($s, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:282: characters 10-38
		$_this = Strings::toArray($s);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			if ($predicate($item)) {
				$result[] = $item;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:282: characters 3-47
		return \Array_hx::wrap($result)->join("");
	}

	/**
	 * Same as `filter` but `predicate` operates on integer char codes instead of string characters.
	 * 
	 * @param string $s
	 * @param \Closure $predicate
	 * 
	 * @return string
	 */
	public static function filterCharcode ($s, $predicate) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:288: characters 26-58
		$_this = Strings::map($s, function ($s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:288: characters 26-40
			return HxString::charCodeAt($s, 0);
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:288: characters 26-58
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			if ($predicate($item)) {
				$result[] = $item;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:288: characters 3-59
		$codes = \Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:289: characters 10-66
		$result = [];
		$data = $codes->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \mb_chr($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:289: characters 3-75
		return \Array_hx::wrap($result)->join("");
	}

	/**
	 * `from` searches for the first occurrance of `searchFor` and returns the text from that point on.
	 * If `searchFor` is not found, an empty string is returned.
	 * 
	 * @param string $value
	 * @param string $searchFor
	 * 
	 * @return string
	 */
	public static function from ($value, $searchFor) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:298: characters 3-38
		$pos = HxString::indexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:299: lines 299-302
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:300: characters 4-13
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:302: characters 4-31
			return HxString::substring($value, $pos);
		}
	}

	/**
	 * Returns `true` if `value` is not `null` and contains at least one character.
	 * 
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function hasContent ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:321: characters 10-43
		if ($value !== null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:321: characters 27-43
			return mb_strlen($value) > 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:321: characters 10-43
			return false;
		}
	}

	/**
	 * @param string $value
	 * 
	 * @return int
	 */
	public static function hashCode ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:309: characters 3-27
		$code = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:310: characters 13-17
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:310: characters 17-29
		$_g1 = mb_strlen($value);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:310: lines 310-313
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:310: characters 13-29
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:311: characters 4-43
			$c = HxString::charCodeAt($value, $i);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:312: characters 4-49
			$code = (((Int32_Impl_::mul(Strings::$HASCODE_MUL, $code) + $c) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) % Strings::$HASCODE_MAX;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:314: characters 3-22
		return $code;
	}

	/**
	 * Works the same as `underscore` but also replaces underscores with whitespaces.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function humanize ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:327: characters 3-41
		return \StringTools::replace(Strings::underscore($s), "_", " ");
	}

	/**
	 * `ifEmpty` returns `value` if it is neither `null` or empty, otherwise it returns `alt`
	 * 
	 * @param string $value
	 * @param string $alt
	 * 
	 * @return string
	 */
	public static function ifEmpty ($value, $alt) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:368: characters 10-52
		if ((null !== $value) && ("" !== $value)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:368: characters 41-46
			return $value;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:368: characters 49-52
			return $alt;
		}
	}

	/**
	 * Checks if `s` contains only (and at least one) alphabetical characters.
	 * 
	 * @param string $s
	 * 
	 * @return bool
	 */
	public static function isAlpha ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:333: characters 10-44
		if (mb_strlen($s) > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:333: characters 26-44
			return !Strings::$IS_ALPHA->match($s);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:333: characters 10-44
			return false;
		}
	}

	/**
	 * `isAlphaNum` returns `true` if the string only contains alpha-numeric characters.
	 * 
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function isAlphaNum ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:340: characters 3-52
		return ctype_alnum($value);
	}

	/**
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function isBreakingWhitespace ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:348: characters 3-45
		return !Strings::$IS_BREAKINGWHITESPACE->match($value);
	}

	/**
	 * `isDigitsOnly` returns `true` if the string only contains digits.
	 * 
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function isDigitsOnly ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:375: characters 3-60
		return ctype_digit($value);
	}

	/**
	 * `isEmpty` returns true if either `value` is null or is an empty string.
	 * 
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function isEmpty ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:386: characters 10-38
		if ($value !== null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:386: characters 27-38
			return $value === "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:386: characters 10-38
			return true;
		}
	}

	/**
	 * Returns `true` if the value string is composed of only lower cased characters
	 * or case neutral characters.
	 * 
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function isLowerCase ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:355: characters 3-38
		return \mb_strtolower($value) === $value;
	}

	/**
	 * Returns `true` if the value string is composed of only upper cased characters
	 * or case neutral characters.
	 * 
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function isUpperCase ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:362: characters 3-38
		return \mb_strtoupper($value) === $value;
	}

	/**
	 * It returns an iterator holding in sequence one character of the string per iteration.
	 * 
	 * @param string $s
	 * 
	 * @return object
	 */
	public static function iterator ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:419: characters 10-31
		return new ArrayIterator(Strings::toArray($s));
	}

	/**
	 * Convert first letter in `value` to lower case.
	 * 
	 * @param string $value
	 * 
	 * @return string
	 */
	public static function lowerCaseFirst ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:392: characters 3-66
		return (\mb_strtolower(HxString::substring($value, 0, 1))??'null') . (HxString::substring($value, 1)??'null');
	}

	/**
	 * @param string $s
	 * @param string $char
	 * @param int $length
	 * 
	 * @return string
	 */
	public static function lpad ($s, $char, $length) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:694: characters 3-32
		$diff = $length - mb_strlen($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:695: lines 695-699
		if ($diff > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:696: characters 4-33
			return (Strings::repeat($char, $diff)??'null') . ($s??'null');
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:698: characters 4-12
			return $s;
		}
	}

	/**
	 * It maps a string character by character using `callback`.
	 * 
	 * @param string $value
	 * @param \Closure $callback
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function map ($value, $callback) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:425: characters 10-38
		$_this = Strings::toArray($value);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = $callback($item);
		}
		return \Array_hx::wrap($result);
	}

	/**
	 * Converts a string in a quoted string.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function quote ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:484: lines 484-489
		if (HxString::indexOf($s, "\"") < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:485: characters 4-24
			return "\"" . ($s??'null') . "\"";
		} else if (HxString::indexOf($s, "'") < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:487: characters 4-24
			return "'" . ($s??'null') . "'";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:489: characters 4-57
			return "\"" . (\StringTools::replace($s, "\"", "\\\"")??'null') . "\"";
		}
	}

	/**
	 * Returns a random substring from the `value` argument. The length of such value is by default `1`.
	 * 
	 * @param string $value
	 * @param int $length
	 * 
	 * @return string
	 */
	public static function random ($value, $length = 1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:399: characters 10-87
		if ($length === null) {
			$length = 1;
		}
		return \mb_substr($value, (int)(\floor((mb_strlen($value) - $length + 1) * (\mt_rand() / \mt_getrandmax()))), $length);
	}

	/**
	 * Returns a random sampling of the specified length from the seed string.
	 * 
	 * @param string $seed
	 * @param int $length
	 * 
	 * @return string
	 */
	public static function randomSequence ($seed, $length) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:406: characters 10-68
		$_this = Ints::range(0, $length);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = Strings::random($seed);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:406: characters 3-77
		return \Array_hx::wrap($result)->join("");
	}

	/**
	 * Like `Strings.randomSequence`, but automatically uses `haxe.crypto.Base64.CHARS`
	 * as the seed string.
	 * 
	 * @param int $length
	 * 
	 * @return string
	 */
	public static function randomSequence64 ($length) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:413: characters 3-58
		return Strings::randomSequence(Base64::$CHARS, $length);
	}

	/**
	 * If present, it removes all the occurrences of `toremove` from `value`.
	 * 
	 * @param string $value
	 * @param string $toremove
	 * 
	 * @return string
	 */
	public static function remove ($value, $toremove) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:431: characters 3-50
		return \StringTools::replace($value, $toremove, "");
	}

	/**
	 * If present, it removes the `toremove` text from the end of `value`.
	 * 
	 * @param string $value
	 * @param string $toremove
	 * 
	 * @return string
	 */
	public static function removeAfter ($value, $toremove) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:437: characters 10-108
		if (\StringTools::endsWith($value, $toremove)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:437: characters 50-100
			return HxString::substring($value, 0, mb_strlen($value) - mb_strlen($toremove));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:437: characters 103-108
			return $value;
		}
	}

	/**
	 * Removes a slice from `index` to `index + length` from `value`.
	 * 
	 * @param string $value
	 * @param int $index
	 * @param int $length
	 * 
	 * @return string
	 */
	public static function removeAt ($value, $index, $length) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:443: characters 3-69
		return (HxString::substring($value, 0, $index)??'null') . (HxString::substring($value, $index + $length)??'null');
	}

	/**
	 * If present, it removes the `toremove` text from the beginning of `value`.
	 * 
	 * @param string $value
	 * @param string $toremove
	 * 
	 * @return string
	 */
	public static function removeBefore ($value, $toremove) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:449: characters 10-92
		if (\StringTools::startsWith($value, $toremove)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:449: characters 52-84
			return HxString::substring($value, mb_strlen($toremove));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:449: characters 87-92
			return $value;
		}
	}

	/**
	 * If present, it removes the first occurrence of `toremove` from `value`.
	 * 
	 * @param string $value
	 * @param string $toremove
	 * 
	 * @return string
	 */
	public static function removeOne ($value, $toremove) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:455: characters 3-37
		$pos = HxString::indexOf($value, $toremove);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:456: lines 456-457
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:457: characters 4-16
			return $value;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:458: characters 3-74
		return (HxString::substring($value, 0, $pos)??'null') . (HxString::substring($value, $pos + mb_strlen($toremove))??'null');
	}

	/**
	 * `repeat` builds a new string by repeating the argument `s`, n `times`.
	 * ```haxe
	 * 'Xy'.repeat(3); // generates 'XyXyXy'
	 * ```
	 * 
	 * @param string $s
	 * @param int $times
	 * 
	 * @return string
	 */
	public static function repeat ($s, $times) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:469: characters 10-34
		$_g = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:469: characters 21-25
		$_g1 = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:469: characters 25-30
		$_g2 = $times;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:469: characters 11-33
		while ($_g1 < $_g2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:469: characters 21-30
			$i = $_g1++;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:469: characters 32-33
			$_g->arr[$_g->length++] = $s;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:469: characters 3-43
		return $_g->join("");
	}

	/**
	 * Returns a new string whose characters are in reverse order.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function reverse ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:475: characters 3-24
		$arr = Strings::toArray($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:476: characters 3-16
		$arr->arr = \array_reverse($arr->arr);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:477: characters 3-22
		return $arr->join("");
	}

	/**
	 * @param string $s
	 * @param string $char
	 * @param int $length
	 * 
	 * @return string
	 */
	public static function rpad ($s, $char, $length) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:704: characters 3-32
		$diff = $length - mb_strlen($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:705: lines 705-709
		if ($diff > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:706: characters 4-33
			return ($s??'null') . (Strings::repeat($char, $diff)??'null');
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:708: characters 4-12
			return $s;
		}
	}

	/**
	 * Like `StringTools.split` but it only splits on the first occurrance of separator.
	 * 
	 * @param string $s
	 * @param string $separator
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function splitOnce ($s, $separator) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:496: characters 3-34
		$pos = HxString::indexOf($s, $separator);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:497: lines 497-498
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:498: characters 4-14
			return \Array_hx::wrap([$s]);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:499: characters 3-68
		return \Array_hx::wrap([
			HxString::substring($s, 0, $pos),
			HxString::substring($s, $pos + mb_strlen($separator)),
		]);
	}

	/**
	 * Returns `true` if `s` starts with any of the values in `values`.
	 * 
	 * @param string $s
	 * @param object $values
	 * 
	 * @return bool
	 */
	public static function startsWithAny ($s, $values) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:506: characters 3-75
		return Iterables::any($values, function ($start) use (&$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:506: characters 48-74
			return \StringTools::startsWith($s, $start);
		});
	}

	/**
	 * `stripTags` removes any HTML/XML markup from the string leaving only the concatenation
	 * of the existing text nodes.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function stripTags ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:514: characters 3-55
		return strip_tags($s);
	}

	/**
	 * Surrounds a string with the contents of `left` and `right`. If `right` is omitted,
	 * `left` will be used on both sides;
	 * 
	 * @param string $s
	 * @param string $left
	 * @param string $right
	 * 
	 * @return string
	 */
	public static function surround ($s, $left, $right = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:526: characters 3-50
		return "" . ($left??'null') . ($s??'null') . (((null === $right ? $left : $right))??'null');
	}

	/**
	 * It transforms a string into an `Array` of characters.
	 * 
	 * @param string $s
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function toArray ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:539: characters 3-21
		return HxString::split($s, "");
	}

	/**
	 * It transforms a string into an `Array` of char codes in integer format.
	 * 
	 * @param string $s
	 * 
	 * @return int[]|\Array_hx
	 */
	public static function toCharcodes ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:547: lines 547-548
		return Strings::map($s, function ($s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:548: characters 23-45
			return HxString::charCodeAt($s, 0);
		});
	}

	/**
	 * Returns an array of `String` whose elements are equally long (using `len`). If the string `s`
	 * is not exactly divisible by `len` the last element of the array will be shorter.
	 * 
	 * @param string $s
	 * @param int $len
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function toChunks ($s, $len) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:555: characters 3-19
		$chunks = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:557: lines 557-560
		while (mb_strlen($s) > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:558: characters 4-33
			$x = \mb_substr($s, 0, $len);
			$chunks->arr[$chunks->length++] = $x;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:559: characters 8-37
			$s = \mb_substr($s, $len, mb_strlen($s) - $len);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:561: characters 3-16
		return $chunks;
	}

	/**
	 * Returns an array of `String` split by line breaks.
	 * 
	 * @param string $s
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function toLines ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:568: characters 3-30
		return Strings::$SPLIT_LINES->split($s);
	}

	/**
	 * `trimChars` removes from the beginning and the end of the string any character that is present in `charlist`.
	 * 
	 * @param string $value
	 * @param string $charlist
	 * 
	 * @return string
	 */
	public static function trimChars ($value, $charlist) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:575: characters 3-55
		return \trim("strip_tags({0})", s);
	}

	/**
	 * `trimCharsLeft` removes from the beginning of the string any character that is present in `charlist`.
	 * 
	 * @param string $value
	 * @param string $charlist
	 * 
	 * @return string
	 */
	public static function trimCharsLeft ($value, $charlist) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:587: characters 3-51
		return \ltrim($value, $charlist);
	}

	/**
	 * `trimCharsRight` removes from the end of the string any character that is present in `charlist`.
	 * 
	 * @param string $value
	 * @param string $charlist
	 * 
	 * @return string
	 */
	public static function trimCharsRight ($value, $charlist) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:606: characters 3-51
		return \rtrim($value, $charlist);
	}

	/**
	 * `underscore` finds UpperCase characters and turns them into LowerCase and prepends them with a whtiespace.
	 * Sequences of more than one UpperCase character are left untouched.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function underscore ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:627: characters 3-31
		$s = (new \EReg("::", "g"))->replace($s, "/");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:628: characters 3-53
		$s = (new \EReg("([A-Z]+)([A-Z][a-z])", "g"))->replace($s, "\$1_\$2");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:629: characters 3-49
		$s = (new \EReg("([a-z\\d])([A-Z])", "g"))->replace($s, "\$1_\$2");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:630: characters 3-30
		$s = (new \EReg("-", "g"))->replace($s, "_");
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:631: characters 3-25
		return \mb_strtolower($s);
	}

	/**
	 * `upTo` searches for the first occurrance of `searchFor` and returns the text up to that point.
	 * If `searchFor` is not found, the entire string is returned.
	 * 
	 * @param string $value
	 * @param string $searchFor
	 * 
	 * @return string
	 */
	public static function upTo ($value, $searchFor) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:646: characters 3-38
		$pos = HxString::indexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:647: lines 647-650
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:648: characters 4-16
			return $value;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:650: characters 4-34
			return HxString::substring($value, 0, $pos);
		}
	}

	/**
	 * Convert first letter in `value` to upper case.
	 * 
	 * @param string $value
	 * 
	 * @return string
	 */
	public static function upperCaseFirst ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:638: characters 3-66
		return (\mb_strtoupper(HxString::substring($value, 0, 1))??'null') . (HxString::substring($value, 1)??'null');
	}

	/**
	 * @param \EReg $re
	 * 
	 * @return string
	 */
	public static function upperMatch ($re) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:662: characters 10-37
		return \mb_strtoupper($re->matched(0));
	}

	/**
	 * `wrapColumns` splits a long string into lines that are at most `columns` long.
	 * Words whose length exceeds `columns` are not split.
	 * 
	 * @param string $s
	 * @param int $columns
	 * @param string $indent
	 * @param string $newline
	 * 
	 * @return string
	 */
	public static function wrapColumns ($s, $columns = 78, $indent = "", $newline = "\x0A") {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:659: characters 3-148
		if ($columns === null) {
			$columns = 78;
		}
		if ($indent === null) {
			$indent = "";
		}
		if ($newline === null) {
			$newline = "\x0A";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:659: characters 10-134
		$_this = Strings::$SPLIT_LINES->split($s);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = Strings::wrapLine(\trim(Strings::$WSG->replace($item, " ")), $columns, $indent, $newline);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:659: characters 3-148
		return \Array_hx::wrap($result)->join($newline);
	}

	/**
	 * @param string $s
	 * @param int $columns
	 * @param string $indent
	 * @param string $newline
	 * 
	 * @return string
	 */
	public static function wrapLine ($s, $columns, $indent, $newline) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:665: characters 3-65
		$parts = new \Array_hx();
		$pos = 0;
		$len = mb_strlen($s);
		$ilen = mb_strlen($indent);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:666: characters 3-18
		$columns -= $ilen;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:667: lines 667-687
		while (true) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:668: lines 668-671
			if (($pos + $columns) >= ($len - $ilen)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:669: characters 5-33
				$x = HxString::substring($s, $pos);
				$parts->arr[$parts->length++] = $x;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:670: characters 5-10
				break;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:673: characters 4-14
			$i = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:674: lines 674-675
			while (!\StringTools::isSpace($s, $pos + $columns - $i) && ($i < $columns)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:675: characters 5-8
				++$i;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:676: lines 676-686
			if ($i === $columns) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:678: characters 5-10
				$i = 0;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:679: lines 679-680
				while (!\StringTools::isSpace($s, $pos + $columns + $i) && (($pos + $columns + $i) < $len)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:680: characters 6-9
					++$i;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:681: characters 5-52
				$x1 = HxString::substring($s, $pos, $pos + $columns + $i);
				$parts->arr[$parts->length++] = $x1;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:682: characters 5-27
				$pos += $columns + $i + 1;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:684: characters 5-52
				$x2 = HxString::substring($s, $pos, $pos + $columns - $i);
				$parts->arr[$parts->length++] = $x2;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:685: characters 5-27
				$pos += $columns - $i + 1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:689: characters 3-47
		return ($indent??'null') . ($parts->join(($newline??'null') . ($indent??'null'))??'null');
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$order = Ord_Impl_::fromIntComparison(Boot::getStaticClosure(Strings::class, 'compare'));
		self::$HASCODE_MAX = 2147483647;
		self::$HASCODE_MUL = 31;
		self::$monoid = new _HxAnon_Strings0("", function ($a, $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Strings.hx:712: characters 108-120
			return ($a??'null') . ($b??'null');
		});
		self::$UCWORDS = new \EReg("[^a-zA-Z]([a-z])", "g");
		self::$IS_BREAKINGWHITESPACE = new \EReg("[^\x09\x0A\x0D ]", "");
		self::$IS_ALPHA = new \EReg("[^a-zA-Z]", "");
		self::$WSG = new \EReg("[ \x09\x0D\x0A]+", "g");
		self::$SPLIT_LINES = new \EReg("\x0D\x0A|\x0A\x0D|\x0A|\x0D", "g");
		self::$CANONICALIZE_LINES = new \EReg("\x0D\x0A|\x0A\x0D|\x0D", "g");
	}
}

class _HxAnon_Strings0 extends HxAnon {
	function __construct($zero, $append) {
		$this->zero = $zero;
		$this->append = $append;
	}
}

Boot::registerClass(Strings::class, 'thx.Strings');
Strings::__hx__init();
