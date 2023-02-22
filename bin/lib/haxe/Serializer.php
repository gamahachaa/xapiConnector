<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/Serializer.hx
 */

namespace haxe;

use \php\Boot;

/**
 * The Serializer class can be used to encode values and objects into a `String`,
 * from which the `Unserializer` class can recreate the original representation.
 * This class can be used in two ways:
 * - create a `new Serializer()` instance, call its `serialize()` method with
 * any argument and finally retrieve the String representation from
 * `toString()`
 * - call `Serializer.run()` to obtain the serialized representation of a
 * single argument
 * Serialization is guaranteed to work for all haxe-defined classes, but may
 * or may not work for instances of external/native classes.
 * The specification of the serialization format can be found here:
 * <https://haxe.org/manual/std-serialization-format.html>
 */
class Serializer {
	/**
	 * @var bool
	 * If the values you are serializing can contain circular references or
	 * objects repetitions, you should set `USE_CACHE` to true to prevent
	 * infinite loops.
	 * This may also reduce the size of serialization Strings at the expense of
	 * performance.
	 * This value can be changed for individual instances of `Serializer` by
	 * setting their `useCache` field.
	 */
	static public $USE_CACHE = false;

}

Boot::registerClass(Serializer::class, 'haxe.Serializer');
