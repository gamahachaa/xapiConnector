<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:215: lines 215-220
		$__hx__switch = ($target->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:219: characters 15-22
			$_g = $target->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:215: characters 26-30
			$__hx__switch = ($item->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:219: characters 30-37
				$errors2 = $item->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:219: characters 15-22
				$errors1 = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:219: characters 41-70
				return Either::Left(Nel_Impl_::append($errors1, $errors2));
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:218: characters 30-35
				$value = $item->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:218: characters 15-21
				$errors = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:218: characters 39-51
				return Either::Left($errors);
			}
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:217: characters 16-22
			$_g = $target->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:215: characters 26-30
			$__hx__switch = ($item->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:217: characters 30-36
				$errors = $item->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:217: characters 16-22
				$values = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:217: characters 40-52
				return Either::Left($errors);
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:216: characters 31-36
				$value = $item->params[0];
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:216: characters 16-22
				$values = $_g;
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:216: characters 40-67
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:228: characters 3-42
		return Arrays::reduce($items, Boot::getStaticClosure(ValidationExtensions::class, 'appendVNel'), $target);
	}

	/**
	 * @param Either $target
	 * @param Either $item
	 * 
	 * @return Either
	 */
	public static function appendValidation ($target, $item) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:224: characters 3-57
		return ValidationExtensions::appendVNel($target, Eithers::toVNel($item));
	}

	/**
	 * @param Either $target
	 * @param Either[]|\Array_hx $items
	 * 
	 * @return Either
	 */
	public static function appendValidations ($target, $items) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:232: characters 3-48
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:209: lines 209-212
		if ($v->index === 1) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:210: characters 15-16
			$a = $v->params[0];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:210: characters 19-64
			if ($p($a)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:210: characters 29-30
				return $v;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:210: characters 36-64
				return Either::Left(Nel_Impl_::pure($error));
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:211: characters 9-13
			$left = $v;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:211: characters 15-19
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:206: characters 3-48
		return Eithers::leftMap($n, function ($n) use (&$f) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Validation.hx:206: characters 32-47
			return Nel_Impl_::map($n, $f);
		});
	}
}

Boot::registerClass(ValidationExtensions::class, 'thx.ValidationExtensions');
