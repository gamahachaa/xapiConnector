<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:391: characters 3-19
		$this->base = $base;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:392: characters 3-13
		$this->f = $f;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:399: characters 3-24
		return $this->base->hasNext();
	}

	/**
	 * @return mixed
	 */
	public function next () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:396: characters 3-24
		return ($this->f)($this->base->next());
	}
}

Boot::registerClass(MapIterator::class, 'thx.MapIterator');
