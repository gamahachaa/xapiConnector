<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx
 */

namespace thx;

use \php\Boot;

/**
 * Helper class for enums.
 */
class Enums {
	/**
	 * Compares two enum values. Comparison is based on the constructor definition
	 * index. If `a` and `b` are the same constructor and have parameters, parameters
	 * are compared using the same rules applied for `thx.Arrays.compare`.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:24: characters 5-64
		$v = Ints::compare($a->index, $b->index);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:25: lines 25-26
		if ($v !== 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:26: characters 7-15
			return $v;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:27: characters 5-74
		return Arrays::compare(\Array_hx::wrap($a->params), \Array_hx::wrap($b->params));
	}

	/**
	 * Returns the higher between two enum instances. Sequence is determined by their
	 * index in the type definition.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return mixed
	 */
	public static function max ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:52: lines 52-55
		if (Enums::compare($a, $b) > 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:53: characters 7-15
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:55: characters 7-15
			return $b;
		}
	}

	/**
	 * Returns the lower between two enum instances. Sequence is determined by their
	 * index in the type definition.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return mixed
	 */
	public static function min ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:41: lines 41-44
		if (Enums::compare($a, $b) < 0) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:42: characters 7-15
			return $a;
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:44: characters 7-15
			return $b;
		}
	}

	/**
	 * Compares two enum instances for equality ignoring the constructor arguments.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return bool
	 */
	public static function sameConstructor ($a, $b) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:34: characters 5-50
		return $a->index === $b->index;
	}

	/**
	 * Converts an enum value into a `String` representation.
	 * 
	 * @param mixed $e
	 * 
	 * @return string
	 */
	public static function string ($e) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:11: characters 5-40
		$cons = $e->tag;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:12: characters 5-21
		$params = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:13: lines 13-14
		$_g = 0;
		$_g1 = \Array_hx::wrap($e->params);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:13: characters 10-15
			$param = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:13: lines 13-14
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:14: characters 7-42
			$x = Dynamics::string($param);
			$params->arr[$params->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Enums.hx:15: characters 5-76
		return ($cons??'null') . ((($params->length === 0 ? "" : "(" . ($params->join(", ")??'null') . ")"))??'null');
	}
}

Boot::registerClass(Enums::class, 'thx.Enums');
