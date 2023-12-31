<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx
 */

namespace thx;

use \php\Boot;

class MapIIterator {
	/**
	 * @var object
	 */
	public $base;
	/**
	 * @var \Closure
	 */
	public $f;
	/**
	 * @var int
	 */
	public $i;

	/**
	 * @param object $base
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($base, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:401: characters 24-25
		$this->i = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:404: characters 5-21
		$this->base = $base;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:405: characters 5-15
		$this->f = $f;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:415: characters 5-26
		return $this->base->hasNext();
	}

	/**
	 * @return mixed
	 */
	public function next () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:409: characters 5-36
		$result = ($this->f)($this->base->next(), $this->i);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:410: characters 5-8
		$this->i++;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:411: characters 5-18
		return $result;
	}
}

Boot::registerClass(MapIIterator::class, 'thx.MapIIterator');
