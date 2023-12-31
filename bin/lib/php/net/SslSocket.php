<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/php/net/SslSocket.hx
 */

namespace php\net;

use \php\Boot;

class SslSocket extends Socket {
	/**
	 * @return void
	 */
	public function __construct () {
		#C:\HaxeToolkit\haxe\std/php/net/SslSocket.hx:27: characters 3-10
		parent::__construct();
		#C:\HaxeToolkit\haxe\std/php/net/SslSocket.hx:28: characters 3-19
		$this->protocol = "ssl";
	}
}

Boot::registerClass(SslSocket::class, 'php.net.SslSocket');
