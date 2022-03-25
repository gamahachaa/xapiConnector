<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx
 */

namespace thx;

use \thx\error\ErrorWrapper;
use \php\Boot;
use \haxe\StackItem;
use \haxe\_CallStack\CallStack_Impl_;
use \haxe\NativeStackTrace;

/**
 * Defines a generic Error type. When the target platform is JS, `Error` extends the native
 * `js.lib.Error` type.
 */
class Error {
	/**
	 * @var string
	 * The text message associated with the error.
	 */
	public $message;
	/**
	 * @var object
	 * The location in code where the error has been instantiated.
	 */
	public $pos;
	/**
	 * @var StackItem[]|\Array_hx
	 * The collected error stack.
	 */
	public $stackItems;

	/**
	 * It creates an instance of Error from any value.
	 * If `err` is already an instance of `Error`, it is returned and nothing is created.
	 * 
	 * @param mixed $err
	 * @param object $pos
	 * 
	 * @return Error
	 */
	public static function fromDynamic ($err, $pos = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:18: lines 18-19
		if (($err instanceof Error)) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:19: characters 4-19
			return $err;
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:20: characters 3-52
		return new ErrorWrapper("" . \Std::string($err), $err, null, $pos);
	}

	/**
	 * The `Error` constructor only requires a string message. `stack` and `pos` are automatically
	 * populated, but can be provided if preferred.
	 * 
	 * @param string $message
	 * @param StackItem[]|\Array_hx $stack
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($message, $stack = null, $pos = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:48: characters 3-25
		$this->message = $message;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:50: lines 50-54
		if (null === $stack) {
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:51: characters 12-63
			try {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:51: characters 16-42
				$stack = CallStack_Impl_::exceptionStack();
			} catch(\Throwable $_g) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:51: characters 50-51
				NativeStackTrace::saveStack($_g);
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:51: characters 61-63
				$stack = new \Array_hx();
			}
			#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:52: lines 52-53
			if ($stack->length === 0) {
				#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:53: characters 13-59
				try {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:53: characters 17-38
					$stack = CallStack_Impl_::callStack();
				} catch(\Throwable $_g) {
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:53: characters 46-47
					NativeStackTrace::saveStack($_g);
					#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:53: characters 57-59
					$stack = new \Array_hx();
				}
			}
		}
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:55: characters 3-26
		$this->stackItems = $stack;
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:56: characters 3-17
		$this->pos = $pos;
	}

	/**
	 * @return string
	 */
	public function getPosition () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:63: characters 3-74
		return ($this->pos->className??'null') . "." . ($this->pos->methodName??'null') . "() at " . ($this->pos->lineNumber??'null');
	}

	/**
	 * @return string
	 */
	public function stackToString () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:66: characters 3-40
		return CallStack_Impl_::toString($this->stackItems);
	}

	/**
	 * @return string
	 */
	public function toString () {
		#C:\HaxeToolkit\haxe\lib\thx,core/git/src/thx/Error.hx:60: characters 3-73
		return ($this->message??'null') . "\x0Afrom: " . ($this->getPosition()??'null') . "\x0A\x0A" . ($this->stackToString()??'null');
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(Error::class, 'thx.Error');
