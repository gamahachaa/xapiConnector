<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/Lambda.hx
 */

use \php\Boot;

/**
 * The `Lambda` class is a collection of methods to support functional
 * programming. It is ideally used with `using Lambda` and then acts as an
 * extension to Iterable types.
 * On static platforms, working with the Iterable structure might be slower
 * than performing the operations directly on known types, such as Array and
 * List.
 * If the first argument to any of the methods is null, the result is
 * unspecified.
 * @see https://haxe.org/manual/std-Lambda.html
 */
class Lambda {
	/**
	 * Tells if `it` contains an element for which `f` is true.
	 * This function returns true as soon as an element is found for which a
	 * call to `f` returns true.
	 * If no such element is found, the result is false.
	 * If `f` is null, the result is unspecified.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return bool
	 */
	public static function exists ($it, $f) {
		#C:\HaxeToolkit\haxe\std/Lambda.hx:126: characters 13-15
		$x = $it->iterator();
		while ($x->hasNext()) {
			#C:\HaxeToolkit\haxe\std/Lambda.hx:126: lines 126-128
			$x1 = $x->next();
			#C:\HaxeToolkit\haxe\std/Lambda.hx:127: lines 127-128
			if ($f($x1)) {
				#C:\HaxeToolkit\haxe\std/Lambda.hx:128: characters 5-16
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\std/Lambda.hx:129: characters 3-15
		return false;
	}

	/**
	 * Tells if `it` contains `elt`.
	 * This function returns true as soon as an element is found which is equal
	 * to `elt` according to the `==` operator.
	 * If no such element is found, the result is false.
	 * 
	 * @param object $it
	 * @param mixed $elt
	 * 
	 * @return bool
	 */
	public static function has ($it, $elt) {
		#C:\HaxeToolkit\haxe\std/Lambda.hx:109: characters 13-15
		$x = $it->iterator();
		while ($x->hasNext()) {
			#C:\HaxeToolkit\haxe\std/Lambda.hx:109: lines 109-111
			$x1 = $x->next();
			#C:\HaxeToolkit\haxe\std/Lambda.hx:110: lines 110-111
			if (Boot::equal($x1, $elt)) {
				#C:\HaxeToolkit\haxe\std/Lambda.hx:111: characters 5-16
				return true;
			}
		}
		#C:\HaxeToolkit\haxe\std/Lambda.hx:112: characters 3-15
		return false;
	}
}

Boot::registerClass(Lambda::class, 'Lambda');
