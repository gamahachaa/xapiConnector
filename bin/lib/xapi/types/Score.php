<?php
/**
 */

namespace xapi\types;

use \php\Boot;

/**
 * ...
 * @author bb
 */
class Score {
	/**
	 * @var float
	 */
	public $max;
	/**
	 * @var float
	 */
	public $min;
	/**
	 * @var float
	 */
	public $raw;
	/**
	 * @var float
	 */
	public $scaled;

	/**
	 * @param float $raw
	 * @param float $max
	 * @param float $min
	 * 
	 * @return void
	 */
	public function __construct ($raw = 0, $max = 100, $min = 0) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:17: lines 17-22
		if ($raw === null) {
			$raw = 0;
		}
		if ($max === null) {
			$max = 100;
		}
		if ($min === null) {
			$min = 0;
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:18: characters 3-17
		$this->set_max($max);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:19: characters 3-17
		$this->set_min($min);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:20: characters 3-17
		$this->set_raw($raw);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:21: characters 3-30
		$this->scaled = (Boot::equal($max, 0) ? 0 : $raw / $max);
	}

	/**
	 * @return float
	 */
	public function get_max () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:61: characters 3-13
		return $this->max;
	}

	/**
	 * @return float
	 */
	public function get_min () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:51: characters 3-13
		return $this->min;
	}

	/**
	 * @return float
	 */
	public function get_raw () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:39: characters 3-13
		return $this->raw;
	}

	/**
	 * @return float
	 */
	public function get_scaled () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:33: characters 3-37
		return $this->scaled = (Boot::equal($this->get_max(), 0) ? 0 : $this->get_raw() / $this->get_max());
	}

	/**
	 * @return void
	 */
	public function reset () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:25: characters 4-11
		$this->set_raw(0);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:26: characters 4-13
		$this->set_max(100);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:27: characters 4-11
		$this->set_min(0);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:28: characters 4-16
		$this->scaled = 0.0;
	}

	/**
	 * @param float $value
	 * 
	 * @return float
	 */
	public function set_max ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:66: characters 3-14
		$this->max = $value;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:67: characters 3-15
		$this->get_scaled();
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:68: characters 3-13
		return $this->get_max();
	}

	/**
	 * @param float $value
	 * 
	 * @return float
	 */
	public function set_min ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:56: characters 3-21
		return $this->min = $value;
	}

	/**
	 * @param float $value
	 * 
	 * @return float
	 */
	public function set_raw ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:44: characters 3-14
		$this->raw = $value;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:45: characters 3-15
		$this->get_scaled();
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/types/Score.hx:46: characters 3-21
		return $this->raw = $value;
	}
}

Boot::registerClass(Score::class, 'xapi.types.Score');
Boot::registerGetters('xapi\\types\\Score', [
	'max' => true,
	'min' => true,
	'raw' => true,
	'scaled' => true
]);
Boot::registerSetters('xapi\\types\\Score', [
	'max' => true,
	'min' => true,
	'raw' => true
]);
