<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/Int64.hx
 */

namespace haxe\_Int64;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\Exception;
use \haxe\_Int32\Int32_Impl_;

final class Int64_Impl_ {
	/**
	 * Performs signed integer divison of `dividend` by `divisor`.
	 * Returns `{ quotient : Int64, modulus : Int64 }`.
	 * 
	 * @param ___Int64 $dividend
	 * @param ___Int64 $divisor
	 * 
	 * @return object
	 */
	public static function divMod ($dividend, $divisor) {
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:173: lines 173-180
		if ($divisor->high === 0) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:174: characters 12-23
			$__hx__switch = ($divisor->low);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:176: characters 6-11
				throw Exception::thrown("divide by zero");
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:178: characters 24-39
				$this1 = new ___Int64($dividend->high, $dividend->low);
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:178: characters 50-51
				$this2 = new ___Int64(0, 0);
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:178: characters 6-52
				return new _HxAnon_Int64_Impl_0($this1, $this2);
			}
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:182: characters 3-53
		$divSign = ($dividend->high < 0) !== ($divisor->high < 0);
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:184: characters 3-64
		$modulus = null;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:184: characters 17-63
		if ($dividend->high < 0) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:184: characters 36-45
			$high = (~$dividend->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$dividend->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:184: characters 36-45
			$this1 = new ___Int64($high, $low);
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:184: characters 3-64
			$modulus = $this1;
		} else {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:184: characters 48-63
			$this1 = new ___Int64($dividend->high, $dividend->low);
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:184: characters 3-64
			$modulus = $this1;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:185: characters 13-49
		if ($divisor->high < 0) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:185: characters 31-39
			$high = (~$divisor->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$divisor->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:185: characters 31-39
			$this1 = new ___Int64($high, $low);
			$divisor = $this1;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:187: characters 3-26
		$this1 = new ___Int64(0, 0);
		$quotient = $this1;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:188: characters 3-22
		$this1 = new ___Int64(0, 1);
		$mask = $this1;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:190: lines 190-196
		while (!($divisor->high < 0)) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:191: characters 14-40
			$v = Int32_Impl_::ucompare($divisor->high, $modulus->high);
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:191: characters 4-41
			$cmp = ($v !== 0 ? $v : Int32_Impl_::ucompare($divisor->low, $modulus->low));
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:192: characters 4-17
			$b = 1;
			$b &= 63;
			if ($b === 0) {
				$this1 = new ___Int64($divisor->high, $divisor->low);
				$divisor = $this1;
			} else if ($b < 32) {
				$this2 = new ___Int64((((($divisor->high << $b << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) | Boot::shiftRightUnsigned($divisor->low, (32 - $b))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, ($divisor->low << $b << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits);
				$divisor = $this2;
			} else {
				$this3 = new ___Int64(($divisor->low << ($b - 32) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, 0);
				$divisor = $this3;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:193: characters 4-14
			$b1 = 1;
			$b1 &= 63;
			if ($b1 === 0) {
				$this4 = new ___Int64($mask->high, $mask->low);
				$mask = $this4;
			} else if ($b1 < 32) {
				$this5 = new ___Int64((((($mask->high << $b1 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) | Boot::shiftRightUnsigned($mask->low, (32 - $b1))) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, ($mask->low << $b1 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits);
				$mask = $this5;
			} else {
				$this6 = new ___Int64(($mask->low << ($b1 - 32) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, 0);
				$mask = $this6;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:194: lines 194-195
			if ($cmp >= 0) {
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:195: characters 5-10
				break;
			}
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:198: lines 198-205
		while (true) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:198: characters 10-19
			$b_high = 0;
			$b_low = 0;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:198: lines 198-205
			if (!(($mask->high !== $b_high) || ($mask->low !== $b_low))) {
				break;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:199: characters 8-34
			$v = Int32_Impl_::ucompare($modulus->high, $divisor->high);
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:199: lines 199-202
			if ((($v !== 0 ? $v : Int32_Impl_::ucompare($modulus->low, $divisor->low))) >= 0) {
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:200: characters 5-21
				$this1 = new ___Int64((($quotient->high | $mask->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits, (($quotient->low | $mask->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits);
				$quotient = $this1;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:201: characters 5-23
				$high = (($modulus->high - $divisor->high) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$low = (($modulus->low - $divisor->low) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				if (Int32_Impl_::ucompare($modulus->low, $divisor->low) < 0) {
					$ret = $high--;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:278: characters 4-8
					$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:201: characters 5-23
				$this2 = new ___Int64($high, $low);
				$modulus = $this2;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:203: characters 4-15
			$b = 1;
			$b &= 63;
			if ($b === 0) {
				$this3 = new ___Int64($mask->high, $mask->low);
				$mask = $this3;
			} else if ($b < 32) {
				$this4 = new ___Int64(Boot::shiftRightUnsigned($mask->high, $b), (((($mask->high << (32 - $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) | Boot::shiftRightUnsigned($mask->low, $b)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits);
				$mask = $this4;
			} else {
				$this5 = new ___Int64(0, Boot::shiftRightUnsigned($mask->high, ($b - 32)));
				$mask = $this5;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:204: characters 4-18
			$b1 = 1;
			$b1 &= 63;
			if ($b1 === 0) {
				$this6 = new ___Int64($divisor->high, $divisor->low);
				$divisor = $this6;
			} else if ($b1 < 32) {
				$this7 = new ___Int64(Boot::shiftRightUnsigned($divisor->high, $b1), (((($divisor->high << (32 - $b1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) | Boot::shiftRightUnsigned($divisor->low, $b1)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits);
				$divisor = $this7;
			} else {
				$this8 = new ___Int64(0, Boot::shiftRightUnsigned($divisor->high, ($b1 - 32)));
				$divisor = $this8;
			}
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:207: lines 207-208
		if ($divSign) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:208: characters 15-24
			$high = (~$quotient->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$quotient->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:208: characters 15-24
			$this1 = new ___Int64($high, $low);
			$quotient = $this1;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:209: lines 209-210
		if ($dividend->high < 0) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:210: characters 14-22
			$high = (~$modulus->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			$low = ((~$modulus->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			if ($low === 0) {
				$ret = $high++;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
				$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:210: characters 14-22
			$this1 = new ___Int64($high, $low);
			$modulus = $this1;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:212: lines 212-215
		return new _HxAnon_Int64_Impl_0($quotient, $modulus);
	}

	/**
	 * Returns whether the value `val` is of type `haxe.Int64`
	 * 
	 * @param mixed $val
	 * 
	 * @return bool
	 */
	public static function isInt64 ($val) {
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:78: characters 3-36
		return ($val instanceof ___Int64);
	}

	/**
	 * @param ___Int64 $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:134: characters 3-27
		$i = $this1;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:135: characters 7-13
		$b_high = 0;
		$b_low = 0;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:135: lines 135-136
		if (($i->high === $b_high) && ($i->low === $b_low)) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:136: characters 4-14
			return "0";
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:137: characters 3-16
		$str = "";
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:138: characters 3-19
		$neg = false;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:139: lines 139-142
		if ($i->high < 0) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:140: characters 4-7
			$neg = true;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:143: characters 3-22
		$this1 = new ___Int64(0, 10);
		$ten = $this1;
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:144: lines 144-153
		while (true) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:144: characters 10-16
			$b_high = 0;
			$b_low = 0;
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:144: lines 144-153
			if (!(($i->high !== $b_high) || ($i->low !== $b_low))) {
				break;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:145: characters 4-26
			$r = Int64_Impl_::divMod($i, $ten);
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:146: lines 146-152
			if ($r->modulus->high < 0) {
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:147: characters 11-31
				$x = $r->modulus;
				$high = (~$x->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$low = ((~$x->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				if ($low === 0) {
					$ret = $high++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
					$high = ($high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:147: characters 11-31
				$this_high = $high;
				$this_low = $low;
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:147: characters 5-8
				$str = ($this_low??'null') . ($str??'null');
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:148: characters 9-30
				$x1 = $r->quotient;
				$high1 = (~$x1->high << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				$low1 = ((~$x1->low + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				if ($low1 === 0) {
					$ret1 = $high1++;
					#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:225: characters 4-8
					$high1 = ($high1 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:148: characters 9-30
				$this1 = new ___Int64($high1, $low1);
				$i = $this1;
			} else {
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:150: characters 5-8
				$str = ($r->modulus->low??'null') . ($str??'null');
				#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:151: characters 5-6
				$i = $r->quotient;
			}
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:154: lines 154-155
		if ($neg) {
			#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:155: characters 4-7
			$str = "-" . ($str??'null');
		}
		#C:\HaxeToolkit\haxe\std/haxe/Int64.hx:156: characters 3-13
		return $str;
	}
}

class _HxAnon_Int64_Impl_0 extends HxAnon {
	function __construct($quotient, $modulus) {
		$this->quotient = $quotient;
		$this->modulus = $modulus;
	}
}

Boot::registerClass(Int64_Impl_::class, 'haxe._Int64.Int64_Impl_');
