<?php
/**
 */

namespace thx;

use \haxe\_Int64\Int64_Impl_;
use \php\_Boot\HxAnon;
use \haxe\_Int64\___Int64;
use \php\Boot;
use \haxe\Exception;
use \php\_Boot\HxString;
use \haxe\_Int32\Int32_Impl_;

/**
 * `Int64` helper methods.
 */
class Int64s {
	/**
	 * @var ___Int64
	 */
	static public $maxValue;
	/**
	 * @var ___Int64
	 */
	static public $min;
	/**
	 * @var ___Int64
	 */
	static public $minValue;
	/**
	 * @var ___Int64
	 */
	static public $one;
	/**
	 * @var ___Int64
	 */
	static public $ten;
	/**
	 * @var ___Int64
	 */
	static public $two;
	/**
	 * @var ___Int64
	 */
	static public $zero;

	/**
	 * @param ___Int64 $value
	 * 
	 * @return ___Int64
	 */
	public static function abs ($value) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:47: characters 27-41
		$this1 = new ___Int64(0, 0);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:47: characters 12-63
		if (Int64s::compare($value, $this1) > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:47: characters 49-54
			return $value;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:47: characters 57-63
			$high = (~$value->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$value->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			$this1 = new ___Int64($high, $low);
			return $this1;
		}
	}

	/**
	 * @param ___Int64 $a
	 * @param ___Int64 $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:53: characters 12-36
		$v = (($a->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($a->low, $b->low);
		}
		if ($a->high < 0) {
			if ($b->high < 0) {
				return $v;
			} else {
				return -1;
			}
		} else if ($b->high >= 0) {
			return $v;
		} else {
			return 1;
		}
	}

	/**
	 * @param ___Int64 $num
	 * @param ___Int64 $div
	 * 
	 * @return ___Int64
	 */
	public static function divCeil ($num, $div) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:116: characters 8-20
		$b_high = 0;
		$b_low = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:116: lines 116-117
		if (($num->high === $b_high) && ($num->low === $b_low)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:117: characters 7-18
			return Int64s::$zero;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:118: characters 8-20
		$b_high = 0;
		$b_low = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:118: lines 118-119
		if (($div->high === $b_high) && ($div->low === $b_low)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:119: characters 14-19
			throw Exception::thrown(new Error("Int64s.divCeil division by zero", null, new _HxAnon_Int64s0("thx/Int64s.hx", 119, "thx.Int64s", "divCeil")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:124: lines 124-126
		$r = Int64_Impl_::divMod($num, $div);
		$q = $r->quotient;
		$m = $r->modulus;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:128: characters 8-49
		$tmp = null;
		if (($num->high < 0) === ($div->high < 0)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:128: characters 39-49
			$b_high = 0;
			$b_low = 0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:128: characters 8-49
			$tmp = !(($m->high === $b_high) && ($m->low === $b_low));
		} else {
			$tmp = false;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:128: lines 128-131
		if ($tmp) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:129: characters 14-21
			$b = Int64s::$one;
			$high = (($q->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($q->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $q->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:129: characters 14-21
			$this1 = new ___Int64($high, $low);
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:131: characters 7-15
			return $q;
		}
	}

	/**
	 * @param ___Int64 $num
	 * @param ___Int64 $div
	 * 
	 * @return ___Int64
	 */
	public static function divFloor ($num, $div) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:108: characters 8-20
		$b_high = 0;
		$b_low = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:108: lines 108-109
		if (($num->high === $b_high) && ($num->low === $b_low)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:109: characters 7-18
			return Int64s::$zero;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:110: characters 8-20
		$b_high = 0;
		$b_low = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:110: lines 110-111
		if (($div->high === $b_high) && ($div->low === $b_low)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:111: characters 14-19
			throw Exception::thrown(new Error("Int64s.divFloor division by zero", null, new _HxAnon_Int64s0("thx/Int64s.hx", 111, "thx.Int64s", "divFloor")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:112: characters 12-63
		$a = Int64_Impl_::divMod($num, $div)->quotient;
		$x = (($num->high < 0) !== ($div->high < 0) ? 1 : 0);
		$b_high = $x >> 31;
		$b_low = $x;
		$high = (($a->high - $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		$low = (($a->low - $b_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if (Int32_Impl_::ucompare($a->low, $b_low) < 0) {
			$ret = $high--;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
			$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:112: characters 12-63
		$this1 = new ___Int64($high, $low);
		return $this1;
	}

	/**
	 * @param ___Int64 $num
	 * @param ___Int64 $div
	 * 
	 * @return ___Int64
	 */
	public static function divRound ($num, $div) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:94: characters 8-20
		$b_high = 0;
		$b_low = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:94: lines 94-95
		if (($num->high === $b_high) && ($num->low === $b_low)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:95: characters 7-18
			return Int64s::$zero;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:96: characters 8-20
		$b_high = 0;
		$b_low = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:96: lines 96-97
		if (($div->high === $b_high) && ($div->low === $b_low)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:97: characters 14-19
			throw Exception::thrown(new Error("Int64s.divRound division by zero", null, new _HxAnon_Int64s0("thx/Int64s.hx", 97, "thx.Int64s", "divRound")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:98: lines 98-104
		if (($num->high < 0) === ($div->high < 0)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:99: characters 15-30
			$b = Int64_Impl_::divMod($div, Int64s::$two)->quotient;
			$high = (($num->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($num->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $num->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:99: characters 15-30
			$this1 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:99: characters 14-37
			return Int64_Impl_::divMod($this1, $div)->quotient;
		} else if ($div->high < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 15-19
			$high = (~$num->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$num->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 15-19
			$a_high = $high;
			$a_low = $low;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 15-25
			$b = Int64s::$one;
			$high = (($a_high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a_low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a_low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 15-25
			$a_high = $high;
			$a_low = $low;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 15-37
			$b = Int64_Impl_::divMod($div, Int64s::$two)->quotient;
			$high = (($a_high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a_low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $a_low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 15-37
			$this1 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 41-45
			$high = (~$div->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$div->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 41-45
			$this2 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:101: characters 14-45
			return Int64_Impl_::divMod($this1, $this2)->quotient;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:103: characters 15-24
			$b = Int64s::$one;
			$high = (($num->high + $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($num->low + $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($low, $num->low) < 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:103: characters 15-24
			$a_high = $high;
			$a_low = $low;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:103: characters 15-36
			$b = Int64_Impl_::divMod($div, Int64s::$two)->quotient;
			$high = (($a_high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = (($a_low - $b->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if (Int32_Impl_::ucompare($a_low, $b->low) < 0) {
				$ret = $high--;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:103: characters 15-36
			$this1 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:103: characters 14-43
			return Int64_Impl_::divMod($this1, $div)->quotient;
		}
	}

	/**
	 * @param float $f
	 * 
	 * @return ___Int64
	 */
	public static function fromFloat ($f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:161: lines 161-162
		if (\is_nan($f) || !\is_finite($f)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:162: characters 7-12
			throw Exception::thrown(new Error("Conversion to Int64 failed. Number is NaN or Infinite", null, new _HxAnon_Int64s0("thx/Int64s.hx", 162, "thx.Int64s", "fromFloat")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:164: characters 5-35
		$noFractions = $f - fmod($f, 1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:167: lines 167-168
		if ($noFractions > 9007199254740991.0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:168: characters 7-12
			throw Exception::thrown(new Error("Conversion to Int64 failed. Conversion overflow", null, new _HxAnon_Int64s0("thx/Int64s.hx", 168, "thx.Int64s", "fromFloat")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:169: lines 169-170
		if ($noFractions < -9007199254740991.0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:170: characters 7-12
			throw Exception::thrown(new Error("Conversion to Int64 failed. Conversion underflow", null, new _HxAnon_Int64s0("thx/Int64s.hx", 170, "thx.Int64s", "fromFloat")));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:172: lines 172-174
		$result = Int64s::$zero;
		$neg = $noFractions < 0.0;
		$rest = ($neg ? -$noFractions : $noFractions);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:176: characters 5-21
		$i = 0;
		$curr = null;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:177: lines 177-183
		while ($rest >= 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:178: characters 7-11
			$curr = fmod($rest, 2);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:179: characters 7-11
			$rest /= 2;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:180: lines 180-181
			if ($curr >= 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 46-60
				$a_high = 0;
				$a_low = 1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 36-64
				$b = $i;
				$b &= 63;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 18-65
				$b1 = null;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 36-64
				if ($b === 0) {
					$this1 = new ___Int64($a_high, $a_low);
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 18-65
					$b1 = $this1;
				} else if ($b < 32) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 36-64
					$this2 = new ___Int64((((($a_high << $b << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) | Boot::shiftRightUnsigned($a_low, (32 - $b))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, ($a_low << $b << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits);
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 18-65
					$b1 = $this2;
				} else {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 36-64
					$this3 = new ___Int64(($a_low << ($b - 32) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, 0);
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 18-65
					$b1 = $this3;
				}
				$high = (($result->high + $b1->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$low = (($result->low + $b1->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				if (Int32_Impl_::ucompare($low, $result->low) < 0) {
					$ret = $high++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
					$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:181: characters 18-65
				$this4 = new ___Int64($high, $low);
				$result = $this4;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:182: characters 7-10
			++$i;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:185: lines 185-188
		if ($neg) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:186: characters 14-31
			$high = (~$result->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$result->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:186: characters 14-31
			$this1 = new ___Int64($high, $low);
			return $this1;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:188: characters 7-20
			return $result;
		}
	}

	/**
	 * @param string $s
	 * 
	 * @return ___Int64
	 */
	public static function parse ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:57: lines 57-59
		$sIsNegative = false;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:58: characters 22-36
		$this1 = new ___Int64(0, 1);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:57: lines 57-59
		$multiplier = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:59: characters 19-33
		$this1 = new ___Int64(0, 0);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:57: lines 57-59
		$current = $this1;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:60: lines 60-63
		if (\mb_substr($s, 0, 1) === "-") {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:61: characters 7-18
			$sIsNegative = true;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:62: characters 7-8
			$s = HxString::substring($s, 1, mb_strlen($s));
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:64: characters 5-24
		$len = mb_strlen($s);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:66: characters 15-19
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:66: characters 19-22
		$_g1 = $len;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:66: lines 66-83
		while ($_g < $_g1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:66: characters 15-22
			$i = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:67: characters 7-59
			$digitInt = HxString::charCodeAt($s, $len - 1 - $i) - 48;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:69: lines 69-70
			if (($digitInt < 0) || ($digitInt > 9)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:70: characters 9-14
				throw Exception::thrown(new Error("String should only contain digits (and an optional - sign)", null, new _HxAnon_Int64s0("thx/Int64s.hx", 70, "thx.Int64s", "parse")));
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:72: characters 19-40
			$digit_high = $digitInt >> 31;
			$digit_low = $digitInt;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:73: lines 73-81
			if ($sIsNegative) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:74: characters 38-66
				$mask = 65535;
				$al = $multiplier->low & $mask;
				$ah = Boot::shiftRightUnsigned($multiplier->low, 16);
				$bl = $digit_low & $mask;
				$bh = Boot::shiftRightUnsigned($digit_low, 16);
				$p00 = Int32_Impl_::mul($al, $bl);
				$p10 = Int32_Impl_::mul($ah, $bl);
				$p01 = Int32_Impl_::mul($al, $bh);
				$p11 = Int32_Impl_::mul($ah, $bh);
				$low = $p00;
				$high = ((((($p11 + (Boot::shiftRightUnsigned($p01, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p10, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
				$p01 = ($p01 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
				$low = (($low + $p01) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:74: characters 38-66
				if (Int32_Impl_::ucompare($low, $p01) < 0) {
					$ret = $high++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
					$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
				$p10 = ($p10 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
				$low = (($low + $p10) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:74: characters 38-66
				if (Int32_Impl_::ucompare($low, $p10) < 0) {
					$ret1 = $high++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
					$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:74: characters 38-66
				$high = (($high + (((Int32_Impl_::mul($multiplier->low, $digit_high) + Int32_Impl_::mul($multiplier->high, $digit_low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$b_high = $high;
				$b_low = $low;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:74: characters 19-67
				$high1 = (($current->high - $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$low1 = (($current->low - $b_low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				if (Int32_Impl_::ucompare($current->low, $b_low) < 0) {
					$ret2 = $high1--;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
					$high1 = ($high1 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:74: characters 19-67
				$this1 = new ___Int64($high1, $low1);
				$current = $this1;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:75: lines 75-76
				if (!($current->high < 0)) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:76: characters 11-16
					throw Exception::thrown(new Error("Int64 parsing error: Underflow", null, new _HxAnon_Int64s0("thx/Int64s.hx", 76, "thx.Int64s", "parse")));
				}
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:78: characters 38-66
				$mask1 = 65535;
				$al1 = $multiplier->low & $mask1;
				$ah1 = Boot::shiftRightUnsigned($multiplier->low, 16);
				$bl1 = $digit_low & $mask1;
				$bh1 = Boot::shiftRightUnsigned($digit_low, 16);
				$p001 = Int32_Impl_::mul($al1, $bl1);
				$p101 = Int32_Impl_::mul($ah1, $bl1);
				$p011 = Int32_Impl_::mul($al1, $bh1);
				$p111 = Int32_Impl_::mul($ah1, $bh1);
				$low2 = $p001;
				$high2 = ((((($p111 + (Boot::shiftRightUnsigned($p011, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p101, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
				$p011 = ($p011 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
				$low2 = (($low2 + $p011) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:78: characters 38-66
				if (Int32_Impl_::ucompare($low2, $p011) < 0) {
					$ret3 = $high2++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
					$high2 = ($high2 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
				$p101 = ($p101 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
				$low2 = (($low2 + $p101) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:78: characters 38-66
				if (Int32_Impl_::ucompare($low2, $p101) < 0) {
					$ret4 = $high2++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
					$high2 = ($high2 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:78: characters 38-66
				$high2 = (($high2 + (((Int32_Impl_::mul($multiplier->low, $digit_high) + Int32_Impl_::mul($multiplier->high, $digit_low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$b_high1 = $high2;
				$b_low1 = $low2;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:78: characters 19-67
				$high3 = (($current->high + $b_high1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$low3 = (($current->low + $b_low1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				if (Int32_Impl_::ucompare($low3, $current->low) < 0) {
					$ret5 = $high3++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:264: characters 4-8
					$high3 = ($high3 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:78: characters 19-67
				$this2 = new ___Int64($high3, $low3);
				$current = $this2;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:79: lines 79-80
				if ($current->high < 0) {
					#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:80: characters 11-16
					throw Exception::thrown(new Error("Int64 parsing error: Overflow", null, new _HxAnon_Int64s0("thx/Int64s.hx", 80, "thx.Int64s", "parse")));
				}
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:82: characters 20-46
			$b = Int64s::$ten;
			$mask2 = 65535;
			$al2 = $multiplier->low & $mask2;
			$ah2 = Boot::shiftRightUnsigned($multiplier->low, 16);
			$bl2 = $b->low & $mask2;
			$bh2 = Boot::shiftRightUnsigned($b->low, 16);
			$p002 = Int32_Impl_::mul($al2, $bl2);
			$p102 = Int32_Impl_::mul($ah2, $bl2);
			$p012 = Int32_Impl_::mul($al2, $bh2);
			$p112 = Int32_Impl_::mul($ah2, $bh2);
			$low4 = $p002;
			$high4 = ((((($p112 + (Boot::shiftRightUnsigned($p012, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) + (Boot::shiftRightUnsigned($p102, 16))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:302: characters 3-6
			$p012 = ($p012 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:303: characters 3-6
			$low4 = (($low4 + $p012) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:82: characters 20-46
			if (Int32_Impl_::ucompare($low4, $p012) < 0) {
				$ret6 = $high4++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:305: characters 4-8
				$high4 = ($high4 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:306: characters 3-6
			$p102 = ($p102 << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:307: characters 3-6
			$low4 = (($low4 + $p102) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:82: characters 20-46
			if (Int32_Impl_::ucompare($low4, $p102) < 0) {
				$ret7 = $high4++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:309: characters 4-8
				$high4 = ($high4 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:82: characters 20-46
			$high4 = (($high4 + (((Int32_Impl_::mul($multiplier->low, $b->high) + Int32_Impl_::mul($multiplier->high, $b->low)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$this3 = new ___Int64($high4, $low4);
			$multiplier = $this3;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:84: characters 5-19
		return $current;
	}

	/**
	 * Converts an `Int64` to `Float`;
	 * Implementation by Elliott Stoneham.
	 * 
	 * @param ___Int64 $i
	 * 
	 * @return float
	 */
	public static function toFloat ($i) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:142: characters 5-28
		$isNegative = false;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:143: characters 8-13
		$b_high = 0;
		$b_low = 0;
		$v = (($i->high - $b_high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		if ($v === 0) {
			$v = Int32_Impl_::ucompare($i->low, $b_low);
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:143: lines 143-148
		if ((($i->high < 0 ? ($b_high < 0 ? $v : -1) : ($b_high >= 0 ? $v : 1))) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:144: characters 10-17
			$b = Int64s::$min;
			$v = (($i->high - $b->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($v === 0) {
				$v = Int32_Impl_::ucompare($i->low, $b->low);
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:144: lines 144-145
			if ((($i->high < 0 ? ($b->high < 0 ? $v : -1) : ($b->high >= 0 ? $v : 1))) < 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:145: characters 9-38
				return -9223372036854775808.0;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:146: characters 7-17
			$isNegative = true;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:147: characters 11-13
			$high = (~$i->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$i->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:147: characters 11-13
			$this1 = new ___Int64($high, $low);
			$i = $this1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:149: lines 149-150
		$multiplier = 1.0;
		$ret = 0.0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:151: characters 14-18
		$_g = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:151: lines 151-156
		while ($_g < 64) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:151: characters 14-20
			$_ = $_g++;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:152: characters 10-20
			$b = Int64s::$one;
			$a_high = $i->high & $b->high;
			$a_low = $i->low & $b->low;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:152: characters 10-28
			$b1 = Int64s::$zero;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:152: lines 152-153
			if (($a_high !== $b1->high) || ($a_low !== $b1->low)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:153: characters 9-26
				$ret += $multiplier;
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:154: characters 7-24
			$multiplier *= 2.0;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:155: characters 11-19
			$b2 = 1;
			$b2 &= 63;
			if ($b2 === 0) {
				$this1 = new ___Int64($i->high, $i->low);
				$i = $this1;
			} else if ($b2 < 32) {
				$this2 = new ___Int64((($i->high >> $b2) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, (((($i->high << (32 - $b2) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) | Boot::shiftRightUnsigned($i->low, $b2)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits);
				$i = $this2;
			} else {
				$this3 = new ___Int64((($i->high >> 31) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, (($i->high >> ($b2 - 32)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits);
				$i = $this3;
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:157: characters 5-39
		return (($isNegative ? -1 : 1)) * $ret;
	}

	/**
	 * Alias for parse, mainly for disambiguation with other parses using mega Thx.
	 * 
	 * @param string $s
	 * 
	 * @return ___Int64
	 */
	public static function toInt64 ($s) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Int64s.hx:91: characters 5-27
		return Int64s::parse($s);
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


		$this1 = new ___Int64(0, 1);
		self::$one = $this1;
		$this1 = new ___Int64(0, 2);
		self::$two = $this1;
		$this1 = new ___Int64(0, 0);
		self::$zero = $this1;
		$this1 = new ___Int64(0, 10);
		self::$ten = $this1;
		$this1 = new ___Int64(2147483647, -1);
		self::$maxValue = $this1;
		$this1 = new ___Int64(((int)-2147483648), 1);
		self::$minValue = $this1;
		$this1 = new ___Int64(((int)-2147483648), 0);
		self::$min = $this1;
	}
}

class _HxAnon_Int64s0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(Int64s::class, 'thx.Int64s');
Int64s::__hx__init();
