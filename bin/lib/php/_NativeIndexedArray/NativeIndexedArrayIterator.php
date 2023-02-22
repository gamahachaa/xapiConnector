<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/php/NativeIndexedArray.hx
 */

namespace php\_NativeIndexedArray;

use \php\Boot;

class NativeIndexedArrayIterator {
	/**
	 * @var int
	 */
	public $current;
	/**
	 * @var mixed[]
	 */
	public $data;
	/**
	 * @var int
	 */
	public $length;

	/**
	 * @param mixed[] $data
	 * 
	 * @return void
	 */
	public function __construct ($data) {
		#C:\HaxeToolkit\haxe\std/php/NativeIndexedArray.hx:63: characters 20-21
		$this->current = 0;
		#C:\HaxeToolkit\haxe\std/php/NativeIndexedArray.hx:67: characters 3-30
		$this->length = \count($data);
		#C:\HaxeToolkit\haxe\std/php/NativeIndexedArray.hx:68: characters 3-19
		$this->data = $data;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#C:\HaxeToolkit\haxe\std/php/NativeIndexedArray.hx:72: characters 3-26
		return $this->current < $this->length;
	}

	/**
	 * @return mixed
	 */
	public function next () {
		#C:\HaxeToolkit\haxe\std/php/NativeIndexedArray.hx:76: characters 10-25
		return $this->data[$this->current++];
	}
}

Boot::registerClass(NativeIndexedArrayIterator::class, 'php._NativeIndexedArray.NativeIndexedArrayIterator');
