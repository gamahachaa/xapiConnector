<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx
 */

namespace thx;

use \php\Boot;

class RangeIterator {
	/**
	 * @var int
	 */
	public $current;
	/**
	 * @var int
	 */
	public $step;
	/**
	 * @var int
	 */
	public $stop;

	/**
	 * @param int $start
	 * @param int $stop
	 * @param int $step
	 * 
	 * @return void
	 */
	public function __construct ($start, $stop = null, $step = 1) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:295: lines 295-299
		if ($step === null) {
			$step = 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:296: characters 3-23
		$this->current = $start;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:297: characters 3-19
		$this->stop = $stop;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:298: characters 3-19
		$this->step = $step;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:302: characters 10-87
		if (!(($this->stop === null) || (($this->step >= 0) && ($this->current < $this->stop)))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:302: characters 59-87
			if ($this->step < 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:302: characters 72-86
				return $this->current > $this->stop;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:302: characters 59-87
				return false;
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:302: characters 10-87
			return true;
		}
	}

	/**
	 * @return int
	 */
	public function next () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:306: characters 3-24
		$result = $this->current;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:307: characters 3-18
		$this->current += $this->step;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Ints.hx:308: characters 3-16
		return $result;
	}
}

Boot::registerClass(RangeIterator::class, 'thx.RangeIterator');
