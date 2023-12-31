<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/sys/Http.hx
 */

namespace sys;

use \haxe\io\_BytesData\Container;
use \php\net\SslSocket;
use \php\Boot;
use \haxe\io\BytesOutput;
use \sys\net\Socket;
use \haxe\Exception;
use \haxe\io\Output;
use \haxe\io\Eof;
use \haxe\io\BytesBuffer;
use \haxe\io\Error;
use \haxe\http\HttpBase;
use \haxe\io\Input;
use \php\_Boot\HxString;
use \sys\net\Host;
use \haxe\ds\StringMap;
use \haxe\io\Bytes;
use \haxe\NativeStackTrace;

class Http extends HttpBase {
	/**
	 * @var object
	 */
	static public $PROXY = null;

	/**
	 * @var Bytes
	 */
	public $chunk_buf;
	/**
	 * @var int
	 */
	public $chunk_size;
	/**
	 * @var float
	 */
	public $cnxTimeout;
	/**
	 * @var object
	 */
	public $file;
	/**
	 * @var bool
	 */
	public $noShutdown;
	/**
	 * @var StringMap
	 */
	public $responseHeaders;

	/**
	 * @param string $url
	 * 
	 * @return void
	 */
	public function __construct ($url) {
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:49: characters 3-18
		$this->cnxTimeout = 10;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:51: characters 3-69
		$this->noShutdown = !\function_exists("stream_socket_shutdown");
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:53: characters 3-13
		parent::__construct($url);
	}

	/**
	 * @param bool $post
	 * @param Output $api
	 * @param Socket $sock
	 * @param string $method
	 * 
	 * @return void
	 */
	public function customRequest ($post, $api, $sock = null, $method = null) {
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:91: characters 3-31
		$this->responseAsString = null;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:92: characters 3-28
		$this->responseBytes = null;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:93: characters 3-72
		$url_regexp = new \EReg("^(https?://)?([a-zA-Z\\.0-9_-]+)(:[0-9]+)?(.*)\$", "");
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:94: lines 94-97
		if (!$url_regexp->match($this->url)) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:95: characters 4-26
			$this->onError("Invalid URL");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:96: characters 4-10
			return;
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:98: characters 3-54
		$secure = $url_regexp->matched(1) === "https://";
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:99: lines 99-118
		if ($sock === null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:100: lines 100-116
			if ($secure) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:102: characters 5-35
				$sock = new SslSocket();
			} else {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:115: characters 5-24
				$sock = new Socket();
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:117: characters 4-31
			$sock->setTimeout($this->cnxTimeout);
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:119: characters 3-36
		$host = $url_regexp->matched(2);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:120: characters 3-42
		$portString = $url_regexp->matched(3);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:121: characters 3-39
		$request = $url_regexp->matched(4);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:125: lines 125-127
		if (\mb_substr($request, 0, 1) !== "/") {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:126: characters 4-27
			$request = "/" . ($request??'null');
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:128: characters 3-139
		$port = (($portString === null) || ($portString === "") ? ($secure ? 443 : 80) : \Std::parseInt(\mb_substr($portString, 1, mb_strlen($portString) - 1)));
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:130: characters 3-34
		$multipart = $this->file !== null;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:131: characters 3-23
		$boundary = null;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:132: characters 3-18
		$uri = null;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:133: lines 133-173
		if ($multipart) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:134: characters 4-15
			$post = true;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:135: lines 135-138
			$boundary = \Std::string(\mt_rand(0, 999)) . \Std::string(\mt_rand(0, 999)) . \Std::string(\mt_rand(0, 999)) . \Std::string(\mt_rand(0, 999));
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:139: lines 139-140
			while (mb_strlen($boundary) < 38) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:140: characters 5-30
				$boundary = "-" . ($boundary??'null');
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:141: characters 4-28
			$b = new \StringBuf();
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:142: lines 142-153
			$_g = 0;
			$_g1 = $this->params;
			while ($_g < $_g1->length) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:142: characters 9-10
				$p = ($_g1->arr[$_g] ?? null);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:142: lines 142-153
				++$_g;
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:143: characters 5-16
				$b->add("--");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:144: characters 5-20
				$b->add($boundary);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:145: characters 5-18
				$b->add("\x0D\x0A");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:146: characters 5-52
				$b->add("Content-Disposition: form-data; name=\"");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:147: characters 5-18
				$b->add($p->name);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:148: characters 5-15
				$b->add("\"");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:149: characters 5-18
				$b->add("\x0D\x0A");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:150: characters 5-18
				$b->add("\x0D\x0A");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:151: characters 5-19
				$b->add($p->value);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:152: characters 5-18
				$b->add("\x0D\x0A");
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:154: characters 4-15
			$b->add("--");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:155: characters 4-19
			$b->add($boundary);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:156: characters 4-17
			$b->add("\x0D\x0A");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:157: characters 4-51
			$b->add("Content-Disposition: form-data; name=\"");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:158: characters 4-21
			$b->add($this->file->param);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:159: characters 4-26
			$b->add("\"; filename=\"");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:160: characters 4-24
			$b->add($this->file->filename);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:161: characters 4-14
			$b->add("\"");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:162: characters 4-17
			$b->add("\x0D\x0A");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:163: characters 4-61
			$b->add("Content-Type: " . ($this->file->mimeType??'null') . "\x0D\x0A" . "\x0D\x0A");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:164: characters 4-22
			$uri = $b->b;
		} else {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:166: lines 166-172
			$_g = 0;
			$_g1 = $this->params;
			while ($_g < $_g1->length) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:166: characters 9-10
				$p = ($_g1->arr[$_g] ?? null);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:166: lines 166-172
				++$_g;
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:167: lines 167-170
				if ($uri === null) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:168: characters 6-14
					$uri = "";
				} else {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:170: characters 6-16
					$uri = ($uri??'null') . "&";
				}
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:171: characters 5-85
				$uri = ($uri??'null') . (\rawurlencode($p->name)??'null') . "=" . (\rawurlencode("" . ($p->value??'null'))??'null');
			}
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:175: characters 3-29
		$b = new BytesOutput();
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:176: lines 176-182
		if ($method !== null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:177: characters 4-25
			$b->writeString($method);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:178: characters 4-22
			$b->writeString(" ");
		} else if ($post) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:180: characters 4-26
			$b->writeString("POST ");
		} else {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:182: characters 4-25
			$b->writeString("GET ");
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:184: lines 184-191
		if (Http::$PROXY !== null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:185: characters 4-28
			$b->writeString("http://");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:186: characters 4-23
			$b->writeString($host);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:187: lines 187-190
			if ($port !== 80) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:188: characters 5-23
				$b->writeString(":");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:189: characters 5-27
				$b->writeString("" . ($port??'null'));
			}
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:192: characters 3-25
		$b->writeString($request);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:194: lines 194-200
		if (!$post && ($uri !== null)) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:195: lines 195-198
			if (HxString::indexOf($request, "?", 0) >= 0) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:196: characters 5-23
				$b->writeString("&");
			} else {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:198: characters 5-23
				$b->writeString("?");
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:199: characters 4-22
			$b->writeString($uri);
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:201: characters 3-55
		$b->writeString(" HTTP/1.1\x0D\x0AHost: " . ($host??'null') . "\x0D\x0A");
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:202: lines 202-205
		if ($this->postData !== null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:203: characters 16-40
			$s = $this->postData;
			$tmp = \strlen($s);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:203: characters 4-40
			$this->postBytes = new Bytes($tmp, new Container($s));
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:204: characters 4-19
			$this->postData = null;
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:206: lines 206-223
		if ($this->postBytes !== null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:207: characters 4-65
			$b->writeString("Content-Length: " . ($this->postBytes->length??'null') . "\x0D\x0A");
		} else if ($post && ($uri !== null)) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:209: lines 209-218
			if ($multipart || !\Lambda::exists($this->headers, function ($h) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:209: characters 57-88
				return $h->name === "Content-Type";
			})) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:210: characters 5-36
				$b->writeString("Content-Type: ");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:211: lines 211-216
				if ($multipart) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:212: characters 6-42
					$b->writeString("multipart/form-data");
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:213: characters 6-34
					$b->writeString("; boundary=");
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:214: characters 6-29
					$b->writeString($boundary);
				} else {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:216: characters 6-56
					$b->writeString("application/x-www-form-urlencoded");
				}
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:217: characters 5-26
				$b->writeString("\x0D\x0A");
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:219: lines 219-222
			if ($multipart) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:220: characters 5-96
				$b->writeString("Content-Length: " . (mb_strlen($uri) + $this->file->size + mb_strlen($boundary) + 6) . "\x0D\x0A");
			} else {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:222: characters 5-60
				$b->writeString("Content-Length: " . (mb_strlen($uri)??'null') . "\x0D\x0A");
			}
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:224: characters 3-41
		$b->writeString("Connection: close\x0D\x0A");
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:225: lines 225-230
		$_g = 0;
		$_g1 = $this->headers;
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:225: characters 8-9
			$h = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:225: lines 225-230
			++$_g;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:226: characters 4-25
			$b->writeString($h->name);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:227: characters 4-23
			$b->writeString(": ");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:228: characters 4-26
			$b->writeString($h->value);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:229: characters 4-25
			$b->writeString("\x0D\x0A");
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:231: characters 3-24
		$b->writeString("\x0D\x0A");
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:232: lines 232-235
		if ($this->postBytes !== null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:233: characters 4-52
			$b->writeFullBytes($this->postBytes, 0, $this->postBytes->length);
		} else if ($post && ($uri !== null)) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:235: characters 4-22
			$b->writeString($uri);
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:236: lines 236-252
		try {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:237: lines 237-240
			if (Http::$PROXY !== null) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:238: characters 5-61
				$sock->connect(new Host(Http::$PROXY->host), Http::$PROXY->port);
			} else {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:240: characters 5-39
				$sock->connect(new Host($host), $port);
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:241: lines 241-244
			if ($multipart) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:242: characters 5-53
				$this->writeBody($b, $this->file->io, $this->file->size, $boundary, $sock);
			} else {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:244: characters 5-38
				$this->writeBody($b, null, 0, null, $sock);
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:245: characters 4-31
			$this->readHttpResponse($api, $sock);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:246: characters 4-16
			$sock->close();
		} catch(\Throwable $_g) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:247: characters 12-13
			NativeStackTrace::saveStack($_g);
			$e = Exception::caught($_g)->unwrap();
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:248: lines 248-250
			try {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:249: characters 5-17
				$sock->close();
			} catch(\Throwable $_g) {
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:251: characters 4-26
			$this->onError(\Std::string($e));
		}
	}

	/**
	 * @param \EReg $chunk_re
	 * @param Output $api
	 * @param Bytes $buf
	 * @param int $len
	 * 
	 * @return bool
	 */
	public function readChunk ($chunk_re, $api, $buf, $len) {
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:423: lines 423-457
		if ($this->chunk_size === null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:424: lines 424-431
			if ($this->chunk_buf !== null) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:425: characters 5-39
				$b = new BytesBuffer();
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:426: characters 5-21
				$b->b = ($b->b . $this->chunk_buf->b->s);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:427: characters 5-28
				if (($len < 0) || ($len > $buf->length)) {
					throw Exception::thrown(Error::OutsideBounds());
				} else {
					$left = $b->b;
					$this_s = \substr($buf->b->s, 0, $len);
					$b->b = ($left . $this_s);
				}
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:428: characters 5-8
				$buf = $b->getBytes();
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:429: characters 5-28
				$len += $this->chunk_buf->length;
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:430: characters 5-14
				$this->chunk_buf = null;
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:435: lines 435-449
			if ($chunk_re->match($buf->toString())) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:437: characters 5-35
				$p = $chunk_re->matchedPos();
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:438: lines 438-448
				if ($p->len <= $len) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:439: characters 6-37
					$cstr = $chunk_re->matched(1);
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:440: characters 6-16
					$this->chunk_size = \Std::parseInt("0x" . ($cstr??'null'));
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:441: lines 441-445
					if ($this->chunk_size === 0) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:442: characters 7-17
						$this->chunk_size = null;
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:443: characters 7-16
						$this->chunk_buf = null;
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:444: characters 7-19
						return false;
					}
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:446: characters 6-18
					$len -= $p->len;
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:447: characters 38-57
					$pos = $p->len;
					$tmp = null;
					if (($pos < 0) || ($len < 0) || (($pos + $len) > $buf->length)) {
						throw Exception::thrown(Error::OutsideBounds());
					} else {
						$tmp = new Bytes($len, new Container(\substr($buf->b->s, $pos, $len)));
					}
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:447: characters 6-63
					return $this->readChunk($chunk_re, $api, $tmp, $len);
				}
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:451: lines 451-454
			if ($len > 10) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:452: characters 5-29
				$this->onError("Invalid chunk");
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:453: characters 5-17
				return false;
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:455: characters 16-31
			$tmp = null;
			if (($len < 0) || ($len > $buf->length)) {
				throw Exception::thrown(Error::OutsideBounds());
			} else {
				$tmp = new Bytes($len, new Container(\substr($buf->b->s, 0, $len)));
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:455: characters 4-13
			$this->chunk_buf = $tmp;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:456: characters 4-15
			return true;
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:459: lines 459-463
		if ($this->chunk_size > $len) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:460: characters 4-21
			$this->chunk_size -= $len;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:461: characters 4-31
			$api->writeBytes($buf, 0, $len);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:462: characters 4-15
			return true;
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:464: characters 3-28
		$end = $this->chunk_size + 2;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:465: lines 465-473
		if ($len >= $end) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:466: lines 466-467
			if ($this->chunk_size > 0) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:467: characters 5-39
				$api->writeBytes($buf, 0, $this->chunk_size);
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:468: characters 4-14
			$len -= $end;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:469: characters 4-14
			$this->chunk_size = null;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:470: lines 470-471
			if ($len === 0) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:471: characters 5-16
				return true;
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:472: characters 36-53
			$tmp = null;
			if (($end < 0) || ($len < 0) || (($end + $len) > $buf->length)) {
				throw Exception::thrown(Error::OutsideBounds());
			} else {
				$tmp = new Bytes($len, new Container(\substr($buf->b->s, $end, $len)));
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:472: characters 4-59
			return $this->readChunk($chunk_re, $api, $tmp, $len);
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:474: lines 474-475
		if ($this->chunk_size > 0) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:475: characters 4-38
			$api->writeBytes($buf, 0, $this->chunk_size);
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:476: characters 3-20
		$this->chunk_size -= $len;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:477: characters 3-14
		return true;
	}

	/**
	 * @param Output $api
	 * @param Socket $sock
	 * 
	 * @return void
	 */
	public function readHttpResponse ($api, $sock) {
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:282: characters 3-37
		$b = new BytesBuffer();
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:283: characters 3-13
		$k = 4;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:284: characters 3-34
		$s = Bytes::alloc(4);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:285: characters 3-30
		$sock->setTimeout($this->cnxTimeout);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:286: lines 286-342
		while (true) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:287: characters 4-42
			$p = $sock->input->readBytes($s, 0, $k);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:288: lines 288-289
			while ($p !== $k) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:289: characters 5-43
				$p += $sock->input->readBytes($s, $p, $k - $p);
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:290: characters 4-23
			if (($k < 0) || ($k > $s->length)) {
				throw Exception::thrown(Error::OutsideBounds());
			} else {
				$left = $b->b;
				$this_s = \substr($s->b->s, 0, $k);
				$b->b = ($left . $this_s);
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:291: lines 291-341
			if ($k === 1) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:293: characters 6-23
				$c = \ord($s->b->s[0]);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:294: lines 294-295
				if ($c === 10) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:295: characters 7-12
					break;
				}
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:296: lines 296-299
				if ($c === 13) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:297: characters 7-8
					$k = 3;
				} else {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:299: characters 7-8
					$k = 4;
				}
			} else if ($k === 2) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:301: characters 6-23
				$c1 = \ord($s->b->s[1]);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:302: lines 302-309
				if ($c1 === 10) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:303: lines 303-304
					if (\ord($s->b->s[0]) === 13) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:304: characters 8-13
						break;
					}
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:305: characters 7-8
					$k = 4;
				} else if ($c1 === 13) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:307: characters 7-8
					$k = 3;
				} else {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:309: characters 7-8
					$k = 4;
				}
			} else if ($k === 3) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:311: characters 6-23
				$c2 = \ord($s->b->s[2]);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:312: lines 312-325
				if ($c2 === 10) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:313: lines 313-318
					if (\ord($s->b->s[1]) !== 13) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:314: characters 8-9
						$k = 4;
					} else if (\ord($s->b->s[0]) !== 10) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:316: characters 8-9
						$k = 2;
					} else {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:318: characters 8-13
						break;
					}
				} else if ($c2 === 13) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:320: lines 320-323
					if ((\ord($s->b->s[1]) !== 10) || (\ord($s->b->s[0]) !== 13)) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:321: characters 8-9
						$k = 1;
					} else {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:323: characters 8-9
						$k = 3;
					}
				} else {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:325: characters 7-8
					$k = 4;
				}
			} else if ($k === 4) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:327: characters 6-23
				$c3 = \ord($s->b->s[3]);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:328: lines 328-340
				if ($c3 === 10) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:329: lines 329-334
					if (\ord($s->b->s[2]) !== 13) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:330: characters 8-16
						continue;
					} else if ((\ord($s->b->s[1]) !== 10) || (\ord($s->b->s[0]) !== 13)) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:332: characters 8-9
						$k = 2;
					} else {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:334: characters 8-13
						break;
					}
				} else if ($c3 === 13) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:336: lines 336-339
					if ((\ord($s->b->s[2]) !== 10) || (\ord($s->b->s[1]) !== 13)) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:337: characters 8-9
						$k = 3;
					} else {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:339: characters 8-9
						$k = 1;
					}
				}
			}
		};
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:346: characters 3-55
		$headers = HxString::split($b->getBytes()->toString(), "\x0D\x0A");
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:348: characters 18-33
		if ($headers->length > 0) {
			$headers->length--;
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:348: characters 3-34
		$response = \array_shift($headers->arr);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:349: characters 3-32
		$rp = HxString::split($response, " ");
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:350: characters 3-36
		$status = \Std::parseInt(($rp->arr[1] ?? null));
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:351: lines 351-352
		if (($status === 0) || ($status === null)) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:352: characters 4-9
			throw Exception::thrown("Response status error");
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:355: characters 3-16
		if ($headers->length > 0) {
			$headers->length--;
		}
		\array_pop($headers->arr);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:356: characters 3-16
		if ($headers->length > 0) {
			$headers->length--;
		}
		\array_pop($headers->arr);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:357: characters 3-18
		$this->responseHeaders = new StringMap();
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:358: characters 3-19
		$size = null;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:359: characters 3-23
		$chunked = false;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:360: lines 360-372
		$_g = 0;
		while ($_g < $headers->length) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:360: characters 8-13
			$hline = ($headers->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:360: lines 360-372
			++$_g;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:361: characters 4-30
			$a = HxString::split($hline, ": ");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:362: characters 16-25
			if ($a->length > 0) {
				$a->length--;
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:362: characters 4-26
			$hname = \array_shift($a->arr);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:363: characters 4-57
			$hval = ($a->length === 1 ? ($a->arr[0] ?? null) : $a->join(": "));
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:364: characters 11-53
			$hval = \ltrim(\rtrim($hval));
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:365: characters 4-36
			$this->responseHeaders->data[$hname] = $hval;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:366: characters 12-31
			$__hx__switch = (\mb_strtolower($hname));
			if ($__hx__switch === "content-length") {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:368: characters 6-10
				$size = \Std::parseInt($hval);
			} else if ($__hx__switch === "transfer-encoding") {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:370: characters 6-13
				$chunked = \mb_strtolower($hval) === "chunked";
			}
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:374: characters 3-19
		$this->onStatus($status);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:376: characters 3-46
		$chunk_re = new \EReg("^([0-9A-Fa-f]+)[ ]*\x0D\x0A", "m");
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:377: characters 3-13
		$this->chunk_size = null;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:378: characters 3-12
		$this->chunk_buf = null;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:380: characters 3-22
		$bufsize = 1024;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:381: characters 3-42
		$buf = Bytes::alloc($bufsize);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:382: lines 382-414
		if ($chunked) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:383: lines 383-391
			try {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:384: lines 384-388
				while (true) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:385: characters 6-54
					$len = $sock->input->readBytes($buf, 0, $bufsize);
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:386: lines 386-387
					if (!$this->readChunk($chunk_re, $api, $buf, $len)) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:387: characters 7-12
						break;
					}
				}
			} catch(\Throwable $_g) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:389: characters 13-14
				NativeStackTrace::saveStack($_g);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:383: lines 383-391
				if ((Exception::caught($_g)->unwrap() instanceof Eof)) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:390: characters 5-10
					throw Exception::thrown("Transfer aborted");
				} else {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:383: lines 383-391
					throw $_g;
				}
			}
		} else if ($size === null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:393: lines 393-394
			if (!$this->noShutdown) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:394: characters 5-31
				$sock->shutdown(false, true);
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:395: lines 395-402
			try {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:396: lines 396-401
				while (true) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:397: characters 6-54
					$len = $sock->input->readBytes($buf, 0, $bufsize);
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:398: lines 398-399
					if ($len === 0) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:399: characters 7-12
						break;
					}
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:400: characters 6-33
					$api->writeBytes($buf, 0, $len);
				}
			} catch(\Throwable $_g) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:402: characters 13-14
				NativeStackTrace::saveStack($_g);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:395: lines 395-402
				if (!(Exception::caught($_g)->unwrap() instanceof Eof)) {
					throw $_g;
				}
			}
		} else {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:404: characters 4-21
			$api->prepare($size);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:405: lines 405-413
			try {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:406: lines 406-410
				while ($size > 0) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:407: characters 6-84
					$len = $sock->input->readBytes($buf, 0, ($size > $bufsize ? $bufsize : $size));
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:408: characters 6-33
					$api->writeBytes($buf, 0, $len);
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:409: characters 6-17
					$size -= $len;
				}
			} catch(\Throwable $_g) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:411: characters 13-14
				NativeStackTrace::saveStack($_g);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:405: lines 405-413
				if ((Exception::caught($_g)->unwrap() instanceof Eof)) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:412: characters 5-10
					throw Exception::thrown("Transfer aborted");
				} else {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:405: lines 405-413
					throw $_g;
				}
			}
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:415: lines 415-416
		if ($chunked && (($this->chunk_size !== null) || ($this->chunk_buf !== null))) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:416: characters 4-9
			throw Exception::thrown("Invalid chunk");
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:417: lines 417-418
		if (($status < 200) || ($status >= 400)) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:418: characters 4-9
			throw Exception::thrown("Http Error #" . ($status??'null'));
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:419: characters 3-14
		$api->close();
	}

	/**
	 * @param bool $post
	 * 
	 * @return void
	 */
	public function request ($post = null) {
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:56: lines 56-72
		$_gthis = $this;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:57: characters 3-42
		$output = new BytesOutput();
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:58: characters 3-21
		$old = $this->onError;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:59: characters 3-19
		$err = false;
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:60: lines 60-66
		$this->onError = function ($e) use (&$err, &$old, &$_gthis, &$output) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:61: characters 4-37
			$_gthis->responseBytes = $output->getBytes();
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:62: characters 4-14
			$err = true;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:64: characters 4-17
			$_gthis->onError = $old;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:65: characters 4-14
			$_gthis->onError($e);
		};
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:67: characters 39-55
		$post = $post || ($this->postBytes !== null) || ($this->postData !== null);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:68: characters 3-30
		$this->customRequest($post, $output);
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:69: lines 69-71
		if (!$err) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:70: characters 4-30
			$this->success($output->getBytes());
		}
	}

	/**
	 * @param BytesOutput $body
	 * @param Input $fileInput
	 * @param int $fileSize
	 * @param string $boundary
	 * @param Socket $sock
	 * 
	 * @return void
	 */
	public function writeBody ($body, $fileInput, $fileSize, $boundary, $sock) {
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:256: lines 256-259
		if ($body !== null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:257: characters 4-32
			$bytes = $body->getBytes();
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:258: characters 4-54
			$sock->output->writeFullBytes($bytes, 0, $bytes->length);
		}
		#C:\HaxeToolkit\haxe\std/sys/Http.hx:260: lines 260-277
		if ($boundary !== null) {
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:261: characters 4-23
			$bufsize = 4096;
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:262: characters 4-43
			$buf = Bytes::alloc($bufsize);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:263: lines 263-272
			while ($fileSize > 0) {
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:264: characters 5-62
				$size = ($fileSize > $bufsize ? $bufsize : $fileSize);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:265: characters 5-17
				$len = 0;
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:266: lines 266-269
				try {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:267: characters 6-45
					$len = $fileInput->readBytes($buf, 0, $size);
				} catch(\Throwable $_g) {
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:268: characters 14-15
					NativeStackTrace::saveStack($_g);
					#C:\HaxeToolkit\haxe\std/sys/Http.hx:266: lines 266-269
					if ((Exception::caught($_g)->unwrap() instanceof Eof)) {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:269: characters 6-11
						break;
					} else {
						#C:\HaxeToolkit\haxe\std/sys/Http.hx:266: lines 266-269
						throw $_g;
					}
				}
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:270: characters 5-44
				$sock->output->writeFullBytes($buf, 0, $len);
				#C:\HaxeToolkit\haxe\std/sys/Http.hx:271: characters 5-20
				$fileSize -= $len;
			}
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:273: characters 4-35
			$sock->output->writeString("\x0D\x0A");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:274: characters 4-33
			$sock->output->writeString("--");
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:275: characters 4-37
			$sock->output->writeString($boundary);
			#C:\HaxeToolkit\haxe\std/sys/Http.hx:276: characters 4-33
			$sock->output->writeString("--");
		}
	}
}

Boot::registerClass(Http::class, 'sys.Http');
