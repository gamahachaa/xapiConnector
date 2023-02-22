<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx
 */

namespace thx;

use \php\Boot;

class MapIterator {
	/**
	 * @var object
	 */
	public $base;
	/**
	 * @var \Closure
	 */
	public $f;

	/**
	 * @param object $base
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($base, $f) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:387: characters 5-21
		$this->base = $base;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:388: characters 5-15
		$this->f = $f;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:395: characters 5-26
		return $this->base->hasNext();
	}

	/**
	 * @return mixed
	 */
	public function next () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Iterators.hx:392: characters 5-26
		return ($this->f)($this->base->next());
	}
}

Boot::registerClass(MapIterator::class, 'thx.MapIterator');
