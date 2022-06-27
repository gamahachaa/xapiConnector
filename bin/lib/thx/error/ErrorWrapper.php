<?php
/**
 */

namespace thx\error;

use \php\Boot;
use \haxe\StackItem;
use \thx\Error;

/**
 * An error that keeps a reference to an internal error.
 * The internal error is stored as Dynamic to keep its usage flexible.
 */
class ErrorWrapper extends Error {
	/**
	 * @var mixed
	 */
	public $innerError;

	/**
	 * @param string $message
	 * @param mixed $innerError
	 * @param StackItem[]|\Array_hx $stack
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($message, $innerError, $stack = null, $pos = null) {
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/error/ErrorWrapper.hx:14: characters 5-31
		parent::__construct($message, $stack, $pos);
		#C:\HaxeToolkit\haxe\lib\thx,core/0,44,0/src/thx/error/ErrorWrapper.hx:16: characters 5-33
		$this->innerError = $innerError;
	}
}

Boot::registerClass(ErrorWrapper::class, 'thx.error.ErrorWrapper');
