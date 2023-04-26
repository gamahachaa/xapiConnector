<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:405: characters 22-23
		$this->i = 0;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:408: characters 3-19
		$this->base = $base;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:409: characters 3-13
		$this->f = $f;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:419: characters 3-24
		return $this->base->hasNext();
	}

	/**
	 * @return mixed
	 */
	public function next () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:413: characters 3-34
		$result = ($this->f)($this->base->next(), $this->i);
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:414: characters 3-6
		$this->i++;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Iterators.hx:415: characters 3-16
		return $result;
	}
}

Boot::registerClass(MapIIterator::class, 'thx.MapIIterator');
