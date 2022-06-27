<?php
/**
 */

namespace xapi;

use \php\Boot;
use \haxe\ds\StringMap;
use \xapi\types\Score;

/**
 * ...
 * @author bb
 */
class Result {
	/**
	 * @var bool
	 */
	public $completion;
	/**
	 * @var string
	 */
	public $duration;
	/**
	 * @var StringMap
	 */
	public $extensions;
	/**
	 * @var string
	 */
	public $response;
	/**
	 * @var Score
	 */
	public $score;
	/**
	 * @var bool
	 */
	public $success;

	/**
	 * @param Score $score
	 * @param bool $success
	 * @param bool $completion
	 * @param string $response
	 * @param float $duration
	 * @param StringMap $extensions
	 * 
	 * @return void
	 */
	public function __construct ($score = null, $success = null, $completion = null, $response = null, $duration = null, $extensions = null) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:25: lines 25-28
		if ($duration !== null) {
			#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:27: characters 4-31
			$this->toISO8601Duration($duration);
		}
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:30: characters 3-27
		$this->response = $response;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:31: characters 3-31
		$this->completion = $completion;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:32: characters 3-25
		$this->success = $success;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:33: characters 3-21
		$this->score = $score;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:34: characters 3-31
		$this->extensions = $extensions;
	}

	/**
	 * @return bool
	 */
	public function get_completion () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:104: characters 3-20
		return $this->completion;
	}

	/**
	 * @return string
	 */
	public function get_duration () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:94: characters 3-18
		return $this->duration;
	}

	/**
	 * @return StringMap
	 */
	public function get_extensions () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:109: characters 3-20
		return $this->extensions;
	}

	/**
	 * @return string
	 */
	public function get_response () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:89: characters 3-18
		return $this->response;
	}

	/**
	 * @return Score
	 */
	public function get_score () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:74: characters 3-15
		return $this->score;
	}

	/**
	 * @return bool
	 */
	public function get_success () {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:84: characters 3-17
		return $this->success;
	}

	/**
	 * @param string $value
	 * 
	 * @return string
	 */
	public function set_duration ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:99: characters 3-26
		return $this->duration = $value;
	}

	/**
	 * @param Score $value
	 * 
	 * @return Score
	 */
	public function set_score ($value) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:79: characters 3-23
		return $this->score = $value;
	}

	/**
	 * @param float $timestamp
	 * 
	 * @return void
	 */
	public function toISO8601Duration ($timestamp) {
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:40: characters 3-16
		$s = 1000;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:41: characters 3-18
		$m = 60 * $s;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:42: characters 3-18
		$h = 60 * $m;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:43: characters 3-18
		$d = 24 * $h;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:44: characters 3-24
		$temp = $timestamp;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:45: characters 3-25
		$modulo = fmod($temp, $d);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:47: characters 3-14
		$t = new \Array_hx();
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:48: characters 3-33
		$t->arr[$t->length++] = ($temp - $modulo) / $d;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:50: characters 3-16
		$temp = $modulo;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:51: characters 3-20
		$modulo = fmod($temp, $h);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:53: characters 3-32
		$t->arr[$t->length++] = ($temp - $modulo) / $h;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:56: characters 3-16
		$temp = $modulo;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:58: characters 3-20
		$modulo = fmod($temp, $m);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:60: characters 3-32
		$t->arr[$t->length++] = ($temp - $modulo) / $m;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:63: characters 3-16
		$temp = $modulo;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:64: characters 3-20
		$modulo = fmod($temp, $s);
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:66: characters 3-32
		$t->arr[$t->length++] = ($temp - $modulo) / $s;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:68: characters 3-16
		$temp = $modulo;
		#C:\HaxeToolkit\haxe\lib\xapi/git/xapi/Result.hx:69: characters 3-64
		$this->duration = \Std::string("P" . (($t->arr[0] ?? null)??'null') . "DT" . (($t->arr[1] ?? null)??'null') . "H" . (($t->arr[2] ?? null)??'null') . "M" . (($t->arr[3] ?? null)??'null') . "S");
	}
}

Boot::registerClass(Result::class, 'xapi.Result');
Boot::registerGetters('xapi\\Result', [
	'score' => true,
	'success' => true,
	'response' => true,
	'duration' => true,
	'completion' => true,
	'extensions' => true
]);
