<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:20: characters 5-40
		$pos = HxString::indexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:21: lines 21-24
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:22: characters 7-16
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:24: characters 7-53
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:33: characters 7-46
		$pos = HxString::lastIndexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:34: lines 34-37
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:35: characters 9-18
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:37: characters 9-55
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:46: characters 5-40
		$pos = HxString::indexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:47: lines 47-50
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:48: characters 7-16
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:50: characters 7-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:59: characters 7-46
		$pos = HxString::lastIndexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:60: lines 60-63
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:61: characters 9-18
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:63: characters 9-39
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:96: characters 5-51
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:71: characters 5-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:79: lines 79-89
		if ($whiteSpaceOnly === null) {
			$whiteSpaceOnly = false;
		}
		if ($whiteSpaceOnly) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:81: characters 5-37
			return \ucwords($value);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:88: characters 7-56
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:102: lines 102-103
		if ((null === $a) && (null === $b)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:103: characters 7-15
			return 0;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:104: lines 104-107
		if (null === $a) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:105: characters 7-16
			return -1;
		} else if (null === $b) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:107: characters 7-15
			return 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:108: characters 12-53
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:160: characters 12-74
		if ($test !== "") {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:160: characters 26-74
			return HxString::indexOf(\mb_strtolower($s), \mb_strtolower($test)) >= 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:160: characters 12-74
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:197: characters 51-52
		$s1 = $s;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:197: characters 5-57
		return Arrays::all($tests, function ($test) use (&$s1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:197: characters 22-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:185: characters 51-52
		$s1 = $s;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:185: characters 5-57
		return Arrays::any($tests, function ($test) use (&$s1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:185: characters 22-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:115: characters 5-68
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:121: characters 24-39
		$tmp = \mb_strtolower($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:121: characters 41-87
		$result = [];
		$data = $values->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \mb_strtolower($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:121: characters 5-88
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:127: characters 5-72
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:133: characters 26-41
		$tmp = \mb_strtolower($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:133: characters 43-89
		$result = [];
		$data = $values->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \mb_strtolower($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:133: characters 5-90
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:144: characters 5-53
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:151: characters 12-40
		if (strcmp($a, $b) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:151: characters 20-22
			return -1;
		} else if (strcmp($a, $b) > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:151: characters 34-35
			return 1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:151: characters 38-39
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:170: characters 12-46
		if ($test !== "") {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:170: characters 26-46
			return HxString::indexOf($s, $test) >= 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:170: characters 12-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:203: characters 36-37
		$s1 = $s;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:203: characters 5-42
		return Arrays::all($tests, function ($test) use (&$s1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:203: characters 22-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:191: characters 36-37
		$s1 = $s;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:191: characters 5-42
		return Arrays::any($tests, function ($test) use (&$s1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:191: characters 22-35
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:179: characters 5-36
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:210: characters 5-31
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:220: characters 15-43
		$a1 = mb_strlen($a);
		$b1 = mb_strlen($b);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:220: characters 5-44
		$min = ($a1 < $b1 ? $a1 : $b1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:221: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:221: characters 18-21
		$_g1 = $min;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:221: lines 221-223
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:221: characters 14-21
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:222: lines 222-223
			if (HxString::substring($a, $i, $i + 1) !== HxString::substring($b, $i, $i + 1)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:223: characters 9-17
				return $i;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:224: characters 5-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:235: lines 235-248
		if ($maxlen === null) {
			$maxlen = 20;
		}
		if ($symbol === null) {
			$symbol = "…";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:238: lines 238-239
		$sl = mb_strlen($s);
		$symboll = mb_strlen($symbol);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:240: lines 240-247
		if ($sl > $maxlen) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:241: lines 241-245
			if ($maxlen < $symboll) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:242: characters 9-55
				return \mb_substr($symbol, $symboll - $maxlen, $maxlen);
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:244: characters 9-54
				return (\mb_substr($s, 0, $maxlen - $symboll)??'null') . ($symbol??'null');
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:247: characters 7-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:257: lines 257-271
		if ($maxlen === null) {
			$maxlen = 20;
		}
		if ($symbol === null) {
			$symbol = "…";
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:260: lines 260-261
		$sl = mb_strlen($s);
		$symboll = mb_strlen($symbol);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:262: lines 262-270
		if ($sl > $maxlen) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:263: lines 263-265
			if ($maxlen <= $symboll) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:264: characters 9-43
				return Strings::ellipsis($s, $maxlen, $symbol);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:266: lines 266-267
			$hll = (int)(\ceil(($maxlen - $symboll) / 2));
			$hlr = (int)(\floor(($maxlen - $symboll) / 2));
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:268: characters 7-65
			return (\mb_substr($s, 0, $hll)??'null') . ($symbol??'null') . (\mb_substr($s, $sl - $hlr, $hlr)??'null');
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:270: characters 7-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:277: characters 5-71
		return Iterables::any($values, function ($end) use (&$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:277: characters 48-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:284: lines 284-285
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:284: lines 284-286
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:292: characters 30-62
		$_this = Strings::map($s, function ($s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:292: characters 30-44
			return HxString::charCodeAt($s, 0);
		});
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:292: characters 30-62
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:292: characters 5-63
		$codes = \Array_hx::wrap($result);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:293: lines 293-294
		$result = [];
		$data = $codes->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \mb_chr($item);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:293: lines 293-295
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:304: characters 5-40
		$pos = HxString::indexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:305: lines 305-308
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:306: characters 7-16
			return "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:308: characters 7-34
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:326: characters 12-45
		if ($value !== null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:326: characters 29-45
			return mb_strlen($value) > 0;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:326: characters 12-45
			return false;
		}
	}

	/**
	 * @param string $value
	 * 
	 * @return int
	 */
	public static function hashCode ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:314: characters 5-31
		$code = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:315: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:315: characters 18-30
		$_g1 = mb_strlen($value);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:315: lines 315-318
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:315: characters 14-30
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:316: characters 7-48
			$c = HxString::charCodeAt($value, $i);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:317: characters 7-52
			$code = (((Int32_Impl_::mul(Strings::$HASCODE_MUL, $code) + $c) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) % Strings::$HASCODE_MAX;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:319: characters 5-24
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:332: characters 5-43
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:373: characters 12-54
		if ((null !== $value) && ("" !== $value)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:373: characters 43-48
			return $value;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:373: characters 51-54
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:338: characters 12-46
		if (mb_strlen($s) > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:338: characters 28-46
			return !Strings::$IS_ALPHA->match($s);
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:338: characters 12-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:345: characters 3-52
		return ctype_alnum($value);
	}

	/**
	 * @param string $value
	 * 
	 * @return bool
	 */
	public static function isBreakingWhitespace ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:353: characters 5-47
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:380: characters 5-61
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:391: characters 12-40
		if ($value !== null) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:391: characters 29-40
			return $value === "";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:391: characters 12-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:360: characters 5-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:367: characters 5-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:424: characters 12-33
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:397: characters 5-68
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:711: characters 5-34
		$diff = $length - mb_strlen($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:712: lines 712-716
		if ($diff > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:713: characters 7-36
			return (Strings::repeat($char, $diff)??'null') . ($s??'null');
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:715: characters 7-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:430: characters 12-40
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:489: lines 489-494
		if (HxString::indexOf($s, "\"") < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:490: characters 7-27
			return "\"" . ($s??'null') . "\"";
		} else if (HxString::indexOf($s, "'") < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:492: characters 7-27
			return "'" . ($s??'null') . "'";
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:494: characters 7-60
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:404: characters 12-89
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:411: characters 12-71
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:411: characters 5-80
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:418: characters 5-60
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:436: characters 5-52
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:442: characters 12-110
		if (\StringTools::endsWith($value, $toremove)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:442: characters 52-102
			return HxString::substring($value, 0, mb_strlen($value) - mb_strlen($toremove));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:442: characters 105-110
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:448: characters 5-71
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:454: characters 12-94
		if (\StringTools::startsWith($value, $toremove)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:454: characters 54-86
			return HxString::substring($value, mb_strlen($toremove));
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:454: characters 89-94
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:460: characters 5-39
		$pos = HxString::indexOf($value, $toremove);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:461: lines 461-462
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:462: characters 7-19
			return $value;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:463: characters 5-76
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:474: characters 12-35
		$_g = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:474: characters 22-26
		$_g1 = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:474: characters 26-31
		$_g2 = $times;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:474: characters 13-34
		while ($_g1 < $_g2) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:474: characters 22-31
			$i = $_g1++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:474: characters 33-34
			$_g->arr[$_g->length++] = $s;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:474: characters 5-44
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:480: characters 5-26
		$arr = Strings::toArray($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:481: characters 5-18
		$arr->arr = \array_reverse($arr->arr);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:482: characters 5-24
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:721: characters 5-34
		$diff = $length - mb_strlen($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:722: lines 722-726
		if ($diff > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:723: characters 7-36
			return ($s??'null') . (Strings::repeat($char, $diff)??'null');
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:725: characters 7-15
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:501: characters 5-36
		$pos = HxString::indexOf($s, $separator);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:502: lines 502-503
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:503: characters 7-17
			return \Array_hx::wrap([$s]);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:504: characters 5-70
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:511: characters 5-77
		return Iterables::any($values, function ($start) use (&$s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:511: characters 50-76
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:519: characters 5-56
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:531: characters 5-46
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:544: characters 5-23
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:552: lines 552-556
		return Strings::map($s, function ($s) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:555: characters 28-50
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:563: characters 5-21
		$chunks = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:565: lines 565-568
		while (mb_strlen($s) > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:566: characters 7-36
			$x = \mb_substr($s, 0, $len);
			$chunks->arr[$chunks->length++] = $x;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:567: characters 11-40
			$s = \mb_substr($s, $len, mb_strlen($s) - $len);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:569: characters 5-18
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:576: characters 5-32
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:583: characters 5-56
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:595: characters 5-52
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:614: characters 5-52
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:637: characters 5-33
		$s = (new \EReg("::", "g"))->replace($s, "/");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:638: characters 5-55
		$s = (new \EReg("([A-Z]+)([A-Z][a-z])", "g"))->replace($s, "\$1_\$2");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:639: characters 5-51
		$s = (new \EReg("([a-z\\d])([A-Z])", "g"))->replace($s, "\$1_\$2");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:640: characters 5-32
		$s = (new \EReg("-", "g"))->replace($s, "_");
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:641: characters 5-27
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:656: characters 5-40
		$pos = HxString::indexOf($value, $searchFor);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:657: lines 657-660
		if ($pos < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:658: characters 7-19
			return $value;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:660: characters 7-37
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:648: characters 5-68
		return (\mb_strtoupper(HxString::substring($value, 0, 1))??'null') . (HxString::substring($value, 1)??'null');
	}

	/**
	 * @param \EReg $re
	 * 
	 * @return string
	 */
	public static function upperMatch ($re) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:676: characters 12-39
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:669: lines 669-673
		if ($columns === null) {
			$columns = 78;
		}
		if ($indent === null) {
			$indent = "";
		}
		if ($newline === null) {
			$newline = "\x0A";
		}
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:679: lines 679-682
		$parts = new \Array_hx();
		$pos = 0;
		$len = mb_strlen($s);
		$ilen = mb_strlen($indent);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:683: characters 5-20
		$columns -= $ilen;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:684: lines 684-704
		while (true) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:685: lines 685-688
			if (($pos + $columns) >= ($len - $ilen)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:686: characters 9-37
				$x = HxString::substring($s, $pos);
				$parts->arr[$parts->length++] = $x;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:687: characters 9-14
				break;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:690: characters 7-17
			$i = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:691: lines 691-692
			while (!\StringTools::isSpace($s, $pos + $columns - $i) && ($i < $columns)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:692: characters 9-12
				++$i;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:693: lines 693-703
			if ($i === $columns) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:695: characters 9-14
				$i = 0;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:696: lines 696-697
				while (!\StringTools::isSpace($s, $pos + $columns + $i) && (($pos + $columns + $i) < $len)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:697: characters 11-14
					++$i;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:698: characters 9-56
				$x1 = HxString::substring($s, $pos, $pos + $columns + $i);
				$parts->arr[$parts->length++] = $x1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:699: characters 9-31
				$pos += $columns + $i + 1;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:701: characters 9-56
				$x2 = HxString::substring($s, $pos, $pos + $columns - $i);
				$parts->arr[$parts->length++] = $x2;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:702: characters 9-31
				$pos += $columns - $i + 1;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:706: characters 5-49
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
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Strings.hx:730: characters 56-68
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
