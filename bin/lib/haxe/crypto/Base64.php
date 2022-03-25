<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/php/_std/haxe/crypto/Base64.hx
 */

namespace haxe\crypto;

use \php\Boot;

class Base64 {
	/**
	 * @var string
	 */
	static public $CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";

}

Boot::registerClass(Base64::class, 'haxe.crypto.Base64');
