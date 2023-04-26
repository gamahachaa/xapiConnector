<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx
 */

namespace thx;

use \php\Boot;
use \thx\_Nel\Nel_Impl_;

class ValidationExtensions {
	/**
	 * @param Either $target
	 * @param Either $item
	 * 
	 * @return Either
	 */
	public static function appendVNel ($target, $item) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:223: lines 223-228
		$__hx__switch = ($target->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:227: characters 18-25
			$_g = $target->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:223: characters 28-32
			$__hx__switch = ($item->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:227: characters 33-40
				$errors2 = $item->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:227: characters 18-25
				$errors1 = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:227: characters 45-74
				return Either::Left(Nel_Impl_::append($errors1, $errors2));
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:226: characters 33-38
				$value = $item->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:226: characters 18-24
				$errors = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:226: characters 43-55
				return Either::Left($errors);
			}
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:225: characters 19-25
			$_g = $target->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:223: characters 28-32
			$__hx__switch = ($item->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:225: characters 33-39
				$errors = $item->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:225: characters 19-25
				$values = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:225: characters 44-56
				return Either::Left($errors);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:224: characters 34-39
				$value = $item->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:224: characters 19-25
				$values = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:224: characters 44-71
				return Either::Right(Arrays::append($values, $value));
			}
		}
	}

	/**
	 * @param Either $target
	 * @param Either[]|\Array_hx $items
	 * 
	 * @return Either
	 */
	public static function appendVNels ($target, $items) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:236: characters 5-44
		return Arrays::reduce($items, Boot::getStaticClosure(ValidationExtensions::class, 'appendVNel'), $target);
	}

	/**
	 * @param Either $target
	 * @param Either $item
	 * 
	 * @return Either
	 */
	public static function appendValidation ($target, $item) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:232: characters 5-59
		return ValidationExtensions::appendVNel($target, Eithers::toVNel($item));
	}

	/**
	 * @param Either $target
	 * @param Either[]|\Array_hx $items
	 * 
	 * @return Either
	 */
	public static function appendValidations ($target, $items) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:240: characters 5-50
		return Arrays::reduce($items, Boot::getStaticClosure(ValidationExtensions::class, 'appendValidation'), $target);
	}

	/**
	 * @param Either $v
	 * @param \Closure $p
	 * @param mixed $error
	 * 
	 * @return Either
	 */
	public static function ensureNel ($v, $p, $error) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:217: lines 217-220
		if ($v->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:218: characters 18-19
			$a = $v->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:218: characters 22-67
			if ($p($a)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:218: characters 32-33
				return $v;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:218: characters 39-67
				return Either::Left(Nel_Impl_::pure($error));
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:219: characters 12-16
			$left = $v;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:219: characters 18-22
			return $left;
		}
	}

	/**
	 * @param Either $n
	 * @param \Closure $f
	 * 
	 * @return Either
	 */
	public static function leftMapNel ($n, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:214: characters 5-50
		return Eithers::leftMap($n, function ($n) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Validation.hx:214: characters 34-49
			return Nel_Impl_::map($n, $f);
		});
	}
}

Boot::registerClass(ValidationExtensions::class, 'thx.ValidationExtensions');
