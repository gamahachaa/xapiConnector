<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx
 */

namespace thx;

use \php\_Boot\HxAnon;
use \php\Boot;

class DynamicsT {
	/**
	 * `exists` returns true if `o` contains a field named `name`.
	 * 
	 * @param mixed $o
	 * @param string $name
	 * 
	 * @return bool
	 */
	public static function exists ($o, $name) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:278: characters 3-35
		return \Reflect::hasField($o, $name);
	}

	/**
	 * `fields` returns an array of string containing the field names of the argument object.
	 * 
	 * @param mixed $o
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function fields ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:284: characters 3-27
		return \Reflect::fields($o);
	}

	/**
	 * `isEmpty` returns `true` if the object doesn't have any field.
	 * 
	 * @param mixed $o
	 * 
	 * @return bool
	 */
	public static function isEmpty ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:272: characters 3-22
		return \Reflect::fields($o)->length === 0;
	}

	/**
	 * Copies the values from the fields of `from` to `to`. If `to` already contains those fields, then it replace
	 * those values with the return value of the function `replacef`.
	 * If not set, `replacef` always returns the value from the `from` object.
	 * 
	 * @param mixed $to
	 * @param mixed $from
	 * @param \Closure $replacef
	 * 
	 * @return mixed
	 */
	public static function merge ($to, $from, $replacef = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:293: lines 293-294
		if (null === $replacef) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:294: characters 4-77
			$replacef = function ($field, $oldv, $newv) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:294: characters 66-77
				return $newv;
			};
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:295: lines 295-302
		$_g = 0;
		$_g1 = \Reflect::fields($from);
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:295: characters 8-13
			$field = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:295: lines 295-302
			++$_g;
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:296: characters 4-42
			$newv = \Reflect::field($from, $field);
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:297: lines 297-301
			if (\Reflect::hasField($to, $field)) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:298: characters 5-81
				\Reflect::setField($to, $field, $replacef($field, \Reflect::field($to, $field), $newv));
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:300: characters 5-38
				\Reflect::setField($to, $field, $newv);
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:303: characters 3-12
		return $to;
	}

	/**
	 * `size` returns how many fields are present in the object.
	 * 
	 * @param mixed $o
	 * 
	 * @return int
	 */
	public static function size ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:320: characters 3-34
		return \Reflect::fields($o)->length;
	}

	/**
	 * Converts an object into an Array<Tuple2<String, Dynamic>> where the left value (_0) of the
	 * tuple is the field name and the right value (_1) is the field value.
	 * 
	 * @param mixed $o
	 * 
	 * @return object[]|\Array_hx
	 */
	public static function tuples ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:333: characters 10-92
		$_this = \Reflect::fields($o);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:333: characters 53-91
			$this1 = new _HxAnon_DynamicsT0($item, \Reflect::field($o, $item));
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:333: characters 10-92
			$result[] = $this1;
		}
		return \Array_hx::wrap($result);
	}

	/**
	 * `values` returns an array of dynamic values containing the values of each field in the argument object.
	 * 
	 * @param mixed $o
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function values ($o) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Dynamics.hx:326: characters 10-75
		$_this = \Reflect::fields($o);
		$result = [];
		$data = $_this->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = \Reflect::field($o, $item);
		}
		return \Array_hx::wrap($result);
	}
}

class _HxAnon_DynamicsT0 extends HxAnon {
	function __construct($_0, $_1) {
		$this->_0 = $_0;
		$this->_1 = $_1;
	}
}

Boot::registerClass(DynamicsT::class, 'thx.DynamicsT');
