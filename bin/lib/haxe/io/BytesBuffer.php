<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/php/_std/haxe/io/BytesBuffer.hx
 */

namespace haxe\io;

use \haxe\io\_BytesData\Container;
use \php\Boot;

class BytesBuffer {
	/**
	 * @var mixed
	 */
	public $b;

	/**
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/io/BytesBuffer.hx:34: characters 3-9
		$this->b = "";
	}

	/**
	 * @return Bytes
	 */
	public function getBytes () {
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/io/BytesBuffer.hx:78: characters 41-47
		$bytes = \strlen($this->b);
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/io/BytesBuffer.hx:78: characters 3-52
		$bytes1 = new Bytes($bytes, new Container($this->b));
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/io/BytesBuffer.hx:79: characters 3-11
		$this->b = null;
		#C:\HaxeToolkit\haxe\std/php/_std/haxe/io/BytesBuffer.hx:80: characters 3-15
		return $bytes1;
	}
}

Boot::registerClass(BytesBuffer::class, 'haxe.io.BytesBuffer');
