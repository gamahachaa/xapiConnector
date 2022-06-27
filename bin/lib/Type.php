<?php
/**
 */

use \php\_Boot\HxAnon;
use \php\Boot;
use \php\_Boot\HxClass;
use \php\_Boot\HxString;
use \haxe\Exception as HaxeException;
use \php\_Boot\HxClosure;
use \php\_Boot\HxEnum;

/**
 * The Haxe Reflection API allows retrieval of type information at runtime.
 * This class complements the more lightweight Reflect class, with a focus on
 * class and enum instances.
 * @see https://haxe.org/manual/types.html
 * @see https://haxe.org/manual/std-reflection.html
 */
class Type {
	/**
	 * Creates an instance of class `cl`.
	 * This function guarantees that the class constructor is not called.
	 * If `cl` is null, the result is unspecified.
	 * 
	 * @param Class $cl
	 * 
	 * @return mixed
	 */
	public static function createEmptyInstance ($cl) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:135: lines 135-136
		if (Boot::getClass('String') === $cl) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:136: characters 4-18
			return "";
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:137: lines 137-138
		if (Boot::getClass(\Array_hx::class) === $cl) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:138: characters 4-18
			return new \Array_hx();
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:140: characters 3-68
		$reflection = new \ReflectionClass($cl->phpClassName);
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:141: characters 3-52
		return $reflection->newInstanceWithoutConstructor();
	}

	/**
	 * Creates an instance of enum `e` by calling its constructor `constr` with
	 * arguments `params`.
	 * If `e` or `constr` is null, or if enum `e` has no constructor named
	 * `constr`, or if the number of elements in `params` does not match the
	 * expected number of constructor arguments, or if any argument has an
	 * invalid type, the result is unspecified.
	 * 
	 * @param Enum $e
	 * @param string $constr
	 * @param mixed[]|\Array_hx $params
	 * 
	 * @return mixed
	 */
	public static function createEnum ($e, $constr, $params = null) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:145: lines 145-146
		if (($e === null) || ($constr === null)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:146: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:148: characters 3-43
		$phpName = $e->phpClassName;
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:150: lines 150-152
		if (!in_array($constr, $phpName::__hx__list())) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:151: characters 4-9
			throw HaxeException::thrown("No such constructor " . ($constr??'null'));
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:154: characters 3-92
		$paramsCounts = $phpName::__hx__paramsCount();
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:155: lines 155-157
		if ((($params === null) && ($paramsCounts[$constr] !== 0)) || (($params !== null) && ($params->length !== $paramsCounts[$constr]))) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:156: characters 4-9
			throw HaxeException::thrown("Provided parameters count does not match expected parameters count");
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:159: lines 159-164
		if ($params === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:160: characters 4-45
			return $phpName::{$constr}();
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:162: characters 4-60
			$nativeArgs = $params->arr;
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:163: characters 4-71
			return $phpName::{$constr}(...$nativeArgs);
		}
	}

	/**
	 * Creates an instance of class `cl`, using `args` as arguments to the
	 * class constructor.
	 * This function guarantees that the class constructor is called.
	 * Default values of constructors arguments are not guaranteed to be
	 * taken into account.
	 * If `cl` or `args` are null, or if the number of elements in `args` does
	 * not match the expected number of constructor arguments, or if any
	 * argument has an invalid type,  or if `cl` has no own constructor, the
	 * result is unspecified.
	 * In particular, default values of constructor arguments are not
	 * guaranteed to be taken into account.
	 * 
	 * @param Class $cl
	 * @param mixed[]|\Array_hx $args
	 * 
	 * @return mixed
	 */
	public static function createInstance ($cl, $args) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:127: lines 127-128
		if (Boot::getClass('String') === $cl) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:128: characters 4-18
			return ($args->arr[0] ?? null);
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:130: characters 3-57
		$nativeArgs = $args->arr;
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:131: characters 27-53
		$tmp = $cl->phpClassName;
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:131: characters 3-80
		return new $tmp(...$nativeArgs);
	}

	/**
	 * Returns the class of `o`, if `o` is a class instance.
	 * If `o` is null or of a different type, null is returned.
	 * In general, type parameter information cannot be obtained at runtime.
	 * 
	 * @param mixed $o
	 * 
	 * @return Class
	 */
	public static function getClass ($o) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:43: lines 43-50
		if (is_object($o) && !($o instanceof HxClass) && !($o instanceof HxEnum)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:44: characters 4-54
			$cls = Boot::getClass(get_class($o));
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:45: characters 11-45
			if (($o instanceof HxAnon)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:45: characters 29-33
				return null;
			} else {
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:45: characters 36-44
				return $cls;
			}
		} else if (is_string($o)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:47: characters 4-22
			return Boot::getClass('String');
		} else {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:49: characters 4-15
			return null;
		}
	}

	/**
	 * Returns the name of class `c`, including its path.
	 * If `c` is inside a package, the package structure is returned dot-
	 * separated, with another dot separating the class name:
	 * `pack1.pack2.(...).packN.ClassName`
	 * If `c` is a sub-type of a Haxe module, that module is not part of the
	 * package structure.
	 * If `c` has no package, the class name is returned.
	 * If `c` is null, the result is unspecified.
	 * The class name does not include any type parameters.
	 * 
	 * @param Class $c
	 * 
	 * @return string
	 */
	public static function getClassName ($c) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:73: lines 73-74
		if ($c === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:74: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:75: characters 3-34
		return Boot::getHaxeName($c);
	}

	/**
	 * Returns the enum of enum instance `o`.
	 * An enum instance is the result of using an enum constructor. Given an
	 * `enum Color { Red; }`, `getEnum(Red)` returns `Enum<Color>`.
	 * If `o` is null, null is returned.
	 * In general, type parameter information cannot be obtained at runtime.
	 * 
	 * @param mixed $o
	 * 
	 * @return Enum
	 */
	public static function getEnum ($o) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:54: lines 54-55
		if ($o === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:55: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:56: characters 3-54
		return Boot::getClass(get_class($o));
	}

	/**
	 * Returns a list of the names of all constructors of enum `e`.
	 * The order of the constructor names in the returned Array is preserved
	 * from the original syntax.
	 * If `e` is null, the result is unspecified.
	 * 
	 * @param Enum $e
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function getEnumConstructs ($e) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:261: lines 261-262
		if ($e === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:262: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:263: characters 3-66
		return \Array_hx::wrap($e->__hx__list());
	}

	/**
	 * Returns the name of enum `e`, including its path.
	 * If `e` is inside a package, the package structure is returned dot-
	 * separated, with another dot separating the enum name:
	 * `pack1.pack2.(...).packN.EnumName`
	 * If `e` is a sub-type of a Haxe module, that module is not part of the
	 * package structure.
	 * If `e` has no package, the enum name is returned.
	 * If `e` is null, the result is unspecified.
	 * The enum name does not include any type parameters.
	 * 
	 * @param Enum $e
	 * 
	 * @return string
	 */
	public static function getEnumName ($e) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:79: characters 3-30
		return Type::getClassName($e);
	}

	/**
	 * Returns a list of the instance fields of class `c`, including
	 * inherited fields.
	 * This only includes fields which are known at compile-time. In
	 * particular, using `getInstanceFields(getClass(obj))` will not include
	 * any fields which were added to `obj` at runtime.
	 * The order of the fields in the returned Array is unspecified.
	 * If `c` is null, the result is unspecified.
	 * 
	 * @param Class $c
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function getInstanceFields ($c) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:193: lines 193-194
		if ($c === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:194: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:195: lines 195-199
		if ($c === Boot::getClass('String')) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:196: lines 196-198
			return \Array_hx::wrap([
				"substr",
				"charAt",
				"charCodeAt",
				"indexOf",
				"lastIndexOf",
				"split",
				"toLowerCase",
				"toUpperCase",
				"toString",
				"length",
			]);
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:201: characters 3-67
		$reflection = new \ReflectionClass($c->phpClassName);
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:203: characters 17-34
		$this1 = [];
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:203: characters 3-35
		$methods = $this1;
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:204: characters 18-41
		$data = $reflection->getMethods();
		$_g_current = 0;
		$_g_length = count($data);
		$_g_data = $data;
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:204: lines 204-211
		while ($_g_current < $_g_length) {
			$method = $_g_data[$_g_current++];
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:205: lines 205-210
			if (!$method->isStatic()) {
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:206: characters 5-33
				$name = $method->getName();
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:207: lines 207-209
				if (!(($name === "__construct") || (HxString::indexOf($name, "__hx_") === 0))) {
					#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:208: characters 6-30
					array_push($methods, $name);
				}
			}
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:213: characters 20-37
		$this1 = [];
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:213: characters 3-38
		$properties = $this1;
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:214: characters 20-46
		$data = $reflection->getProperties();
		$_g1_current = 0;
		$_g1_length = count($data);
		$_g1_data = $data;
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:214: lines 214-221
		while ($_g1_current < $_g1_length) {
			$property = $_g1_data[$_g1_current++];
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:215: lines 215-220
			if (!$property->isStatic()) {
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:216: characters 5-35
				$name = $property->getName();
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:217: lines 217-219
				if (!(($name === "__construct") || (HxString::indexOf($name, "__hx_") === 0))) {
					#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:218: characters 6-33
					array_push($properties, $name);
				}
			}
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:222: characters 3-13
		$properties = array_diff($properties, $methods);
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:224: characters 3-56
		$fields = array_merge($properties, $methods);
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:226: characters 3-44
		return \Array_hx::wrap($fields);
	}

	/**
	 * Returns the super-class of class `c`.
	 * If `c` has no super class, null is returned.
	 * If `c` is null, the result is unspecified.
	 * In general, type parameter information cannot be obtained at runtime.
	 * 
	 * @param Class $c
	 * 
	 * @return Class
	 */
	public static function getSuperClass ($c) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:60: lines 60-61
		if ($c === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:61: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:62: lines 62-66
		$parentClass = null;
		try {
			$parentClass = get_parent_class($c->phpClassName);
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:65: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:67: lines 67-68
		if (!$parentClass) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:68: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:69: characters 3-41
		return Boot::getClass($parentClass);
	}

	/**
	 * Resolves a class by name.
	 * If `name` is the path of an existing class, that class is returned.
	 * Otherwise null is returned.
	 * If `name` is null or the path to a different type, the result is
	 * unspecified.
	 * The class name must not include any type parameters.
	 * 
	 * @param string $name
	 * 
	 * @return Class
	 */
	public static function resolveClass ($name) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:83: lines 83-84
		if ($name === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:84: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:85: lines 85-100
		if ($name === "Bool") {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:93: characters 5-21
			return Boot::getClass('Bool');
		} else if ($name === "Class") {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:97: characters 5-22
			return Boot::getClass('Class');
		} else if ($name === "Dynamic") {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:87: characters 5-24
			return Boot::getClass('Dynamic');
		} else if ($name === "Enum") {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:99: characters 5-21
			return Boot::getClass('Enum');
		} else if ($name === "Float") {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:91: characters 5-22
			return Boot::getClass('Float');
		} else if ($name === "Int") {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:89: characters 5-20
			return Boot::getClass('Int');
		} else if ($name === "String") {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:95: characters 5-18
			return Boot::getClass('String');
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:102: characters 3-40
		$phpClass = Boot::getPhpName($name);
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:103: lines 103-104
		if (!class_exists($phpClass) && !interface_exists($phpClass)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:104: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:106: characters 3-41
		$hxClass = Boot::getClass($phpClass);
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:108: characters 3-22
		return $hxClass;
	}

	/**
	 * Resolves an enum by name.
	 * If `name` is the path of an existing enum, that enum is returned.
	 * Otherwise null is returned.
	 * If `name` is null the result is unspecified.
	 * If `name` is the path to a different type, null is returned.
	 * The enum name must not include any type parameters.
	 * 
	 * @param string $name
	 * 
	 * @return Enum
	 */
	public static function resolveEnum ($name) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:112: lines 112-113
		if ($name === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:113: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:114: lines 114-115
		if ($name === "Bool") {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:115: characters 4-20
			return Boot::getClass('Bool');
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:117: characters 3-40
		$phpClass = Boot::getPhpName($name);
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:118: lines 118-119
		if (!class_exists($phpClass)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:119: characters 4-15
			return null;
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:121: characters 3-41
		$hxClass = Boot::getClass($phpClass);
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:123: characters 3-22
		return $hxClass;
	}

	/**
	 * Returns the runtime type of value `v`.
	 * The result corresponds to the type `v` has at runtime, which may vary
	 * per platform. Assumptions regarding this should be minimized to avoid
	 * surprises.
	 * 
	 * @param mixed $v
	 * 
	 * @return \ValueType
	 */
	public static function typeof ($v) {
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:267: lines 267-268
		if ($v === null) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:268: characters 4-16
			return \ValueType::TNull();
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:270: lines 270-282
		if (is_object($v)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:271: lines 271-272
			if (($v instanceof \Closure) || ($v instanceof HxClosure)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:272: characters 5-21
				return \ValueType::TFunction();
			}
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:273: lines 273-274
			if (($v instanceof \StdClass)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:274: characters 5-19
				return \ValueType::TObject();
			}
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:275: lines 275-276
			if (($v instanceof HxClass)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:276: characters 5-19
				return \ValueType::TObject();
			}
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:278: characters 4-53
			$hxClass = Boot::getClass(get_class($v));
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:279: lines 279-280
			if (($v instanceof HxEnum)) {
				#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:280: characters 5-31
				return \ValueType::TEnum($hxClass);
			}
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:281: characters 4-31
			return \ValueType::TClass($hxClass);
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:284: lines 284-285
		if (is_bool($v)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:285: characters 4-16
			return \ValueType::TBool();
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:286: lines 286-287
		if (is_int($v)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:287: characters 4-15
			return \ValueType::TInt();
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:288: lines 288-289
		if (is_float($v)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:289: characters 4-17
			return \ValueType::TFloat();
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:290: lines 290-291
		if (is_string($v)) {
			#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:291: characters 4-25
			return \ValueType::TClass(Boot::getClass('String'));
		}
		#C:\HaxeToolkit\haxe\std/php/_std/Type.hx:293: characters 3-18
		return \ValueType::TUnknown();
	}
}

Boot::registerClass(Type::class, 'Type');
