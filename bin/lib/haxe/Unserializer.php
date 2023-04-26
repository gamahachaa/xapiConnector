<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx
 */

namespace haxe;

use \haxe\io\_BytesData\Container;
use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\ds\ObjectMap;
use \haxe\_Unserializer\DefaultResolver;
use \haxe\ds\IntMap;
use \haxe\ds\List_hx;
use \haxe\ds\StringMap;
use \haxe\io\Bytes;

/**
 * The `Unserializer` class is the complement to the `Serializer` class. It parses
 * a serialization `String` and creates objects from the contained data.
 * This class can be used in two ways:
 * - create a `new Unserializer()` instance with a given serialization
 * String, then call its `unserialize()` method until all values are
 * extracted
 * - call `Unserializer.run()`  to unserialize a single value from a given
 * String
 * The specification of the serialization format can be found here:
 * <https://haxe.org/manual/serialization/format>
 */
class Unserializer {
	/**
	 * @var object
	 * This value can be set to use custom type resolvers.
	 * A type resolver finds a `Class` or `Enum` instance from a given `String`.
	 * By default, the Haxe `Type` Api is used.
	 * A type resolver must provide two methods:
	 * 1. `resolveClass(name:String):Class<Dynamic>` is called to determine a
	 * `Class` from a class name
	 * 2. `resolveEnum(name:String):Enum<Dynamic>` is called to determine an
	 * `Enum` from an enum name
	 * This value is applied when a new `Unserializer` instance is created.
	 * Changing it afterwards has no effect on previously created instances.
	 */
	static public $DEFAULT_RESOLVER;

	/**
	 * @var string
	 */
	public $buf;
	/**
	 * @var mixed[]|\Array_hx
	 */
	public $cache;
	/**
	 * @var int
	 */
	public $length;
	/**
	 * @var int
	 */
	public $pos;
	/**
	 * @var object
	 */
	public $resolver;
	/**
	 * @var string[]|\Array_hx
	 */
	public $scache;

	/**
	 * Unserializes `v` and returns the according value.
	 * This is a convenience function for creating a new instance of
	 * Unserializer with `v` as buffer and calling its `unserialize()` method
	 * once.
	 * 
	 * @param string $v
	 * 
	 * @return mixed
	 */
	public static function run ($v) {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:471: characters 3-43
		return (new Unserializer($v))->unserialize();
	}

	/**
	 * Creates a new Unserializer instance, with its internal buffer
	 * initialized to `buf`.
	 * This does not parse `buf` immediately. It is parsed only when calls to
	 * `this.unserialize` are made.
	 * Each Unserializer instance maintains its own cache.
	 * 
	 * @param string $buf
	 * 
	 * @return void
	 */
	public function __construct ($buf) {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:102: characters 3-17
		$this->buf = $buf;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:103: characters 3-33
		$this->length = \strlen($this->buf);
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:104: characters 3-10
		$this->pos = 0;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:108: characters 3-23
		$this->scache = new \Array_hx();
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:109: characters 3-22
		$this->cache = new \Array_hx();
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:110: characters 3-28
		$r = Unserializer::$DEFAULT_RESOLVER;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:111: lines 111-114
		if ($r === null) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:112: characters 4-29
			$r = new DefaultResolver();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:113: characters 4-24
			Unserializer::$DEFAULT_RESOLVER = $r;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:115: characters 3-15
		$this->resolver = $r;
	}

	/**
	 * @return int
	 */
	public function readDigits () {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:151: characters 3-13
		$k = 0;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:152: characters 3-17
		$s = false;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:153: characters 3-18
		$fpos = $this->pos;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:154: lines 154-169
		while (true) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:155: characters 12-20
			$p = $this->pos;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:155: characters 4-21
			$c = ($p >= $this->length ? 0 : \ord($this->buf[$p]));
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:156: lines 156-157
			if ($c === 0) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:157: characters 5-10
				break;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:158: lines 158-164
			if ($c === 45) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:159: lines 159-160
				if ($this->pos !== $fpos) {
					#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:160: characters 6-11
					break;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:161: characters 5-13
				$s = true;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:162: characters 5-10
				$this->pos++;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:163: characters 5-13
				continue;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:165: lines 165-166
			if (($c < 48) || ($c > 57)) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:166: characters 5-10
				break;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:167: characters 4-31
			$k = $k * 10 + ($c - 48);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:168: characters 4-9
			$this->pos++;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:170: lines 170-171
		if ($s) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:171: characters 4-11
			$k *= -1;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:172: characters 3-11
		return $k;
	}

	/**
	 * @return float
	 */
	public function readFloat () {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:176: characters 3-16
		$p1 = $this->pos;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:177: lines 177-186
		while (true) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:178: characters 12-20
			$p = $this->pos;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:178: characters 4-21
			$c = ($p >= $this->length ? 0 : \ord($this->buf[$p]));
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:179: lines 179-180
			if ($c === 0) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:180: characters 5-10
				break;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:182: lines 182-185
			if ((($c >= 43) && ($c < 58)) || ($c === 101) || ($c === 69)) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:183: characters 5-10
				$this->pos++;
			} else {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:185: characters 5-10
				break;
			}
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:187: characters 3-54
		return \Std::parseFloat(\substr($this->buf, $p1, $this->pos - $p1));
	}

	/**
	 * Unserializes the next part of `this` Unserializer instance and returns
	 * the according value.
	 * This function may call `this.resolver.resolveClass` to determine a
	 * Class from a String, and `this.resolver.resolveEnum` to determine an
	 * Enum from a String.
	 * If `this` Unserializer instance contains no more or invalid data, an
	 * exception is thrown.
	 * This operation may fail on structurally valid data if a type cannot be
	 * resolved or if a field cannot be set. This can happen when unserializing
	 * Strings that were serialized on a different Haxe target, in which the
	 * serialization side has to make sure not to include platform-specific
	 * data.
	 * Classes are created from `Type.createEmptyInstance`, which means their
	 * constructors are not called.
	 * 
	 * @return mixed
	 */
	public function unserialize () {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:238: characters 11-21
		$p = $this->pos++;
		$__hx__switch = (($p >= $this->length ? 0 : \ord($this->buf[$p])));
		if ($__hx__switch === 65) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:446: characters 5-30
			$name = $this->unserialize();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:447: characters 5-42
			$cl = $this->resolver->resolveClass($name);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:448: lines 448-449
			if ($cl === null) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:449: characters 6-11
				throw Exception::thrown("Class not found " . ($name??'null'));
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:450: characters 5-14
			return $cl;
		} else if ($__hx__switch === 66) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:452: characters 5-30
			$name = $this->unserialize();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:453: characters 5-40
			$e = $this->resolver->resolveEnum($name);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:454: lines 454-455
			if ($e === null) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:455: characters 6-11
				throw Exception::thrown("Enum not found " . ($name??'null'));
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:456: characters 5-13
			return $e;
		} else if ($__hx__switch === 67) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:435: characters 5-30
			$name = $this->unserialize();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:436: characters 5-42
			$cl = $this->resolver->resolveClass($name);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:437: lines 437-438
			if ($cl === null) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:438: characters 6-11
				throw Exception::thrown("Class not found " . ($name??'null'));
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:439: characters 5-50
			$o = \Type::createEmptyInstance($cl);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:440: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $o;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:441: characters 5-26
			$o->hxUnserialize($this);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:442: characters 9-19
			$p = $this->pos++;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:442: lines 442-443
			if ((($p >= $this->length ? 0 : \ord($this->buf[$p]))) !== 103) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:443: characters 6-11
				throw Exception::thrown("Invalid custom data");
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:444: characters 5-13
			return $o;
		} else if ($__hx__switch === 77) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:370: characters 5-37
			$h = new ObjectMap();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:371: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $h;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:372: characters 5-19
			$buf = $this->buf;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:373: lines 373-376
			while (true) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:373: characters 12-20
				$p = $this->pos;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:373: lines 373-376
				if (!((($p >= $this->length ? 0 : \ord($this->buf[$p]))) !== 104)) {
					break;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:374: characters 6-28
				$s = $this->unserialize();
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:375: characters 6-29
				$h->set($s, $this->unserialize());
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:377: characters 5-10
			$this->pos++;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:378: characters 5-13
			return $h;
		} else if ($__hx__switch === 82) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:302: characters 5-26
			$n = $this->readDigits();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:303: lines 303-304
			if (($n < 0) || ($n >= $this->scache->length)) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:304: characters 6-11
				throw Exception::thrown("Invalid string reference");
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:305: characters 5-21
			return ($this->scache->arr[$n] ?? null);
		} else if ($__hx__switch === 97) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:267: characters 5-19
			$buf = $this->buf;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:268: characters 5-34
			$a = new \Array_hx();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:272: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $a;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:273: lines 273-285
			while (true) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:274: characters 14-22
				$p = $this->pos;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:274: characters 6-23
				$c = ($p >= $this->length ? 0 : \ord($this->buf[$p]));
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:275: lines 275-278
				if ($c === 104) {
					#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:276: characters 7-12
					$this->pos++;
					#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:277: characters 7-12
					break;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:279: lines 279-284
				if ($c === 117) {
					#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:280: characters 7-12
					$this->pos++;
					#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:281: characters 7-28
					$n = $this->readDigits();
					#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:282: characters 7-33
					$a->offsetSet($a->length + $n - 1, null);
				} else {
					#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:284: characters 7-28
					$x = $this->unserialize();
					$a->arr[$a->length++] = $x;
				}
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:289: characters 5-13
			return $a;
		} else if ($__hx__switch === 98) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:347: characters 5-37
			$h = new StringMap();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:348: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $h;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:349: characters 5-19
			$buf = $this->buf;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:350: lines 350-353
			while (true) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:350: characters 12-20
				$p = $this->pos;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:350: lines 350-353
				if (!((($p >= $this->length ? 0 : \ord($this->buf[$p]))) !== 104)) {
					break;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:351: characters 6-28
				$s = $this->unserialize();
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:352: characters 6-29
				$value = $this->unserialize();
				$h->data[$s] = $value;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:354: characters 5-10
			$this->pos++;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:355: characters 5-13
			return $h;
		} else if ($__hx__switch === 99) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:309: characters 5-30
			$name = $this->unserialize();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:310: characters 5-42
			$cl = $this->resolver->resolveClass($name);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:311: lines 311-312
			if ($cl === null) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:312: characters 6-11
				throw Exception::thrown("Class not found " . ($name??'null'));
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:313: characters 5-42
			$o = \Type::createEmptyInstance($cl);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:314: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $o;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:315: characters 5-25
			$this->unserializeObject($o);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:316: characters 5-13
			return $o;
		} else if ($__hx__switch === 100) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:250: characters 5-23
			return $this->readFloat();
		} else if ($__hx__switch === 102) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:244: characters 5-17
			return false;
		} else if ($__hx__switch === 105) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:248: characters 5-24
			return $this->readDigits();
		} else if ($__hx__switch === 106) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:326: characters 5-30
			$name = $this->unserialize();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:327: characters 5-44
			$edecl = $this->resolver->resolveEnum($name);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:328: lines 328-329
			if ($edecl === null) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:329: characters 6-11
				throw Exception::thrown("Enum not found " . ($name??'null'));
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:330: characters 5-10
			$this->pos++;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:331: characters 5-30
			$index = $this->readDigits();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:332: characters 5-52
			$tag = (\Type::getEnumConstructs($edecl)->arr[$index] ?? null);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:333: lines 333-334
			if ($tag === null) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:334: characters 6-11
				throw Exception::thrown("Unknown enum index " . ($name??'null') . "@" . ($index??'null'));
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:335: characters 5-41
			$e = $this->unserializeEnum($edecl, $tag);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:336: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $e;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:337: characters 5-13
			return $e;
		} else if ($__hx__switch === 107) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:261: characters 5-20
			return \Math::$NaN;
		} else if ($__hx__switch === 108) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:339: characters 5-24
			$l = new List_hx();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:340: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $l;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:341: characters 5-19
			$buf = $this->buf;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:342: lines 342-343
			while (true) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:342: characters 12-20
				$p = $this->pos;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:342: lines 342-343
				if (!((($p >= $this->length ? 0 : \ord($this->buf[$p]))) !== 104)) {
					break;
				}
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:343: characters 6-26
				$l->add($this->unserialize());
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:344: characters 5-10
			$this->pos++;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:345: characters 5-13
			return $l;
		} else if ($__hx__switch === 109) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:263: characters 5-34
			return \Math::$NEGATIVE_INFINITY;
		} else if ($__hx__switch === 110) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:240: characters 5-16
			return null;
		} else if ($__hx__switch === 111) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:292: characters 5-16
			$o = new HxAnon();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:293: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $o;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:294: characters 5-25
			$this->unserializeObject($o);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:295: characters 5-13
			return $o;
		} else if ($__hx__switch === 112) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:265: characters 5-34
			return \Math::$POSITIVE_INFINITY;
		} else if ($__hx__switch === 113) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:357: characters 5-34
			$h = new IntMap();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:358: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $h;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:359: characters 5-19
			$buf = $this->buf;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:360: characters 13-23
			$p = $this->pos++;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:360: characters 5-24
			$c = ($p >= $this->length ? 0 : \ord($this->buf[$p]));
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:361: lines 361-365
			while ($c === 58) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:362: characters 6-27
				$i = $this->readDigits();
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:363: characters 6-29
				$value = $this->unserialize();
				$h->data[$i] = $value;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:364: characters 10-20
				$p = $this->pos++;
				$c = ($p >= $this->length ? 0 : \ord($this->buf[$p]));
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:366: lines 366-367
			if ($c !== 104) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:367: characters 6-11
				throw Exception::thrown("Invalid IntMap format");
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:368: characters 5-13
			return $h;
		} else if ($__hx__switch === 114) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:297: characters 5-26
			$n = $this->readDigits();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:298: lines 298-299
			if (($n < 0) || ($n >= $this->cache->length)) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:299: characters 6-11
				throw Exception::thrown("Invalid reference");
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:300: characters 5-20
			return ($this->cache->arr[$n] ?? null);
		} else if ($__hx__switch === 115) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:391: characters 5-28
			$len = $this->readDigits();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:392: characters 5-19
			$buf = $this->buf;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:393: characters 9-19
			$p = $this->pos++;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:393: lines 393-394
			if (((($p >= $this->length ? 0 : \ord($this->buf[$p]))) !== 58) || (($this->length - $this->pos) < $len)) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:394: characters 6-11
				throw Exception::thrown("Invalid bytes length");
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:398: characters 5-77
			$phpEncoded = \strtr(\substr($buf, $this->pos, $len), "%:", "+/");
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:399: characters 17-75
			$b = new Container(\base64_decode($phpEncoded));
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:399: characters 5-76
			$bytes = new Bytes(\strlen($b->s), $b);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:431: characters 5-15
			$this->pos += $len;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:432: characters 5-22
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $bytes;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:433: characters 5-17
			return $bytes;
		} else if ($__hx__switch === 116) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:242: characters 5-16
			return true;
		} else if ($__hx__switch === 118) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:380: characters 5-11
			$d = null;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: lines 381-382
			$tmp = null;
			$tmp1 = null;
			$tmp2 = null;
			$tmp3 = null;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-137
			$tmp4 = null;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-109
			$tmp5 = null;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-81
			$tmp6 = null;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-53
			$tmp7 = null;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-17
			$p = $this->pos;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-53
			if ((($p >= $this->length ? 0 : \ord($this->buf[$p]))) >= 48) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 33-41
				$p = $this->pos;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-53
				$tmp7 = (($p >= $this->length ? 0 : \ord($this->buf[$p]))) <= 57;
			} else {
				$tmp7 = false;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-81
			if ($tmp7) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 57-69
				$p = $this->pos + 1;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-81
				$tmp6 = (($p >= $this->length ? 0 : \ord($this->buf[$p]))) >= 48;
			} else {
				$tmp6 = false;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-109
			if ($tmp6) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 85-97
				$p = $this->pos + 1;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-109
				$tmp5 = (($p >= $this->length ? 0 : \ord($this->buf[$p]))) <= 57;
			} else {
				$tmp5 = false;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-137
			if ($tmp5) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 113-125
				$p = $this->pos + 2;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: characters 9-137
				$tmp4 = (($p >= $this->length ? 0 : \ord($this->buf[$p]))) >= 48;
			} else {
				$tmp4 = false;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: lines 381-382
			if ($tmp4) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:382: characters 9-21
				$p = $this->pos + 2;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: lines 381-382
				$tmp3 = (($p >= $this->length ? 0 : \ord($this->buf[$p]))) <= 57;
			} else {
				$tmp3 = false;
			}
			if ($tmp3) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:382: characters 37-49
				$p = $this->pos + 3;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: lines 381-382
				$tmp2 = (($p >= $this->length ? 0 : \ord($this->buf[$p]))) >= 48;
			} else {
				$tmp2 = false;
			}
			if ($tmp2) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:382: characters 65-77
				$p = $this->pos + 3;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: lines 381-382
				$tmp1 = (($p >= $this->length ? 0 : \ord($this->buf[$p]))) <= 57;
			} else {
				$tmp1 = false;
			}
			if ($tmp1) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:382: characters 93-105
				$p = $this->pos + 4;
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: lines 381-382
				$tmp = (($p >= $this->length ? 0 : \ord($this->buf[$p]))) === 45;
			} else {
				$tmp = false;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:381: lines 381-387
			if ($tmp) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:384: characters 6-50
				$d = \Date::fromString(\substr($this->buf, $this->pos, 19));
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:385: characters 6-15
				$this->pos += 19;
			} else {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:387: characters 6-36
				$d = \Date::fromTime($this->readFloat());
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:388: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $d;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:389: characters 5-13
			return $d;
		} else if ($__hx__switch === 119) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:318: characters 5-30
			$name = $this->unserialize();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:319: characters 5-44
			$edecl = $this->resolver->resolveEnum($name);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:320: lines 320-321
			if ($edecl === null) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:321: characters 6-11
				throw Exception::thrown("Enum not found " . ($name??'null'));
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:322: characters 5-51
			$e = $this->unserializeEnum($edecl, $this->unserialize());
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:323: characters 5-18
			$_this = $this->cache;
			$_this->arr[$_this->length++] = $e;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:324: characters 5-13
			return $e;
		} else if ($__hx__switch === 120) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:307: characters 5-10
			throw Exception::thrown($this->unserialize());
		} else if ($__hx__switch === 121) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:252: characters 5-28
			$len = $this->readDigits();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:253: characters 9-19
			$p = $this->pos++;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:253: lines 253-254
			if (((($p >= $this->length ? 0 : \ord($this->buf[$p]))) !== 58) || (($this->length - $this->pos) < $len)) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:254: characters 6-11
				throw Exception::thrown("Invalid string length");
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:255: characters 5-38
			$s = \substr($this->buf, $this->pos, $len);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:256: characters 5-15
			$this->pos += $len;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:257: characters 5-33
			$s = \urldecode($s);
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:258: characters 5-19
			$_this = $this->scache;
			$_this->arr[$_this->length++] = $s;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:259: characters 5-13
			return $s;
		} else if ($__hx__switch === 122) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:246: characters 5-13
			return 0;
		} else {
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:459: characters 3-8
		$this->pos--;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:460: characters 3-8
		throw Exception::thrown("Invalid char " . ($this->buf[$this->pos]??'null') . " at position " . ($this->pos??'null'));
	}

	/**
	 * @param Enum $edecl
	 * @param string $tag
	 * 
	 * @return mixed
	 */
	public function unserializeEnum ($edecl, $tag) {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:206: characters 7-17
		$p = $this->pos++;
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:206: lines 206-207
		if ((($p >= $this->length ? 0 : \ord($this->buf[$p]))) !== 58) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:207: characters 4-9
			throw Exception::thrown("Invalid enum format");
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:208: characters 3-28
		$nargs = $this->readDigits();
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:209: lines 209-210
		if ($nargs === 0) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:210: characters 4-38
			return \Type::createEnum($edecl, $tag);
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:211: characters 3-26
		$args = new \Array_hx();
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:212: lines 212-213
		while ($nargs-- > 0) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:213: characters 4-28
			$x = $this->unserialize();
			$args->arr[$args->length++] = $x;
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:214: characters 3-43
		return \Type::createEnum($edecl, $tag, $args);
	}

	/**
	 * @param object $o
	 * 
	 * @return void
	 */
	public function unserializeObject ($o) {
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:191: lines 191-201
		while (true) {
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:192: lines 192-193
			if ($this->pos >= $this->length) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:193: characters 5-10
				throw Exception::thrown("Invalid object");
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:194: characters 8-16
			$p = $this->pos;
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:194: lines 194-195
			if ((($p >= $this->length ? 0 : \ord($this->buf[$p]))) === 103) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:195: characters 5-10
				break;
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:196: characters 4-34
			$k = $this->unserialize();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:197: lines 197-198
			if (!is_string($k)) {
				#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:198: characters 5-10
				throw Exception::thrown("Invalid object key");
			}
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:199: characters 4-26
			$v = $this->unserialize();
			#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:200: characters 4-29
			\Reflect::setField($o, $k, $v);
		}
		#C:\HaxeToolkit\haxe\std/haxe/Unserializer.hx:202: characters 3-8
		$this->pos++;
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


		self::$DEFAULT_RESOLVER = new DefaultResolver();
	}
}

Boot::registerClass(Unserializer::class, 'haxe.Unserializer');
Unserializer::__hx__init();
