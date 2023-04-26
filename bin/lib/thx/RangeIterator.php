<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx
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
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:284: lines 284-288
		if ($step === null) {
			$step = 1;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:285: characters 5-25
		$this->current = $start;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:286: characters 5-21
		$this->stop = $stop;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:287: characters 5-21
		$this->step = $step;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:291: characters 12-89
		if (!(($this->stop === null) || (($this->step >= 0) && ($this->current < $this->stop)))) {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:291: characters 61-89
			if ($this->step < 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:291: characters 74-88
				return $this->current > $this->stop;
			} else {
				#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:291: characters 61-89
				return false;
			}
		} else {
			#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:291: characters 12-89
			return true;
		}
	}

	/**
	 * @return int
	 */
	public function next () {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:295: characters 5-26
		$result = $this->current;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:296: characters 5-20
		$this->current += $this->step;
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/Ints.hx:297: characters 5-18
		return $result;
	}
}

Boot::registerClass(RangeIterator::class, 'thx.RangeIterator');
