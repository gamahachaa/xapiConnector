<?php
/**
 * Haxe source file: C:\HaxeToolkit\haxe\std/haxe/CallStack.hx
 */

namespace haxe\_CallStack;

use \php\Boot;
use \haxe\StackItem;
use \haxe\NativeStackTrace;

final class CallStack_Impl_ {
	/**
	 * Return the call stack elements, or an empty array if not available.
	 * 
	 * @return StackItem[]|\Array_hx
	 */
	public static function callStack () {
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:52: characters 3-63
		return NativeStackTrace::toHaxe(\debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS));
	}

	/**
	 * @param StackItem $item1
	 * @param StackItem $item2
	 * 
	 * @return bool
	 */
	public static function equalItems ($item1, $item2) {
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:120: lines 120-132
		if ($item1 === null) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:121: lines 121-131
			if ($item2 === null) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:121: characters 23-27
				return true;
			} else {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
				return false;
			}
		} else {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:120: characters 18-23
			$__hx__switch = ($item1->index);
			if ($__hx__switch === 0) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:120: lines 120-131
				if ($item2 === null) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				} else if ($item2->index === 0) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:122: characters 33-37
					return true;
				} else {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				}
			} else if ($__hx__switch === 1) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:120: lines 120-131
				if ($item2 === null) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				} else if ($item2->index === 1) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:123: characters 29-31
					$m2 = $item2->params[0];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:123: characters 17-19
					$m1 = $item1->params[0];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:124: characters 5-13
					return $m1 === $m2;
				} else {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				}
			} else if ($__hx__switch === 2) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:120: lines 120-131
				if ($item2 === null) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				} else if ($item2->index === 2) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:125: characters 54-59
					$item21 = $item2->params[0];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:125: characters 61-66
					$file2 = $item2->params[1];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:125: characters 68-73
					$line2 = $item2->params[2];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:125: characters 75-79
					$col2 = $item2->params[3];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:125: characters 39-43
					$col1 = $item1->params[3];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:125: characters 32-37
					$line1 = $item1->params[2];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:125: characters 25-30
					$file1 = $item1->params[1];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:125: characters 18-23
					$item11 = $item1->params[0];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:126: characters 5-81
					if (($file1 === $file2) && ($line1 === $line2) && ($col1 === $col2)) {
						#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:126: characters 57-81
						return CallStack_Impl_::equalItems($item11, $item21);
					} else {
						#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:126: characters 5-81
						return false;
					}
				} else {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				}
			} else if ($__hx__switch === 3) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:120: lines 120-131
				if ($item2 === null) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				} else if ($item2->index === 3) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:127: characters 42-48
					$class2 = $item2->params[0];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:127: characters 50-57
					$method2 = $item2->params[1];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:127: characters 25-32
					$method1 = $item1->params[1];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:127: characters 17-23
					$class1 = $item1->params[0];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:128: characters 5-43
					if ($class1 === $class2) {
						#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:128: characters 25-43
						return $method1 === $method2;
					} else {
						#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:128: characters 5-43
						return false;
					}
				} else {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				}
			} else if ($__hx__switch === 4) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:120: lines 120-131
				if ($item2 === null) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				} else if ($item2->index === 4) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:129: characters 43-45
					$v2 = $item2->params[0];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:129: characters 24-26
					$v1 = $item1->params[0];
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:130: characters 5-13
					return $v1 === $v2;
				} else {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:131: characters 12-17
					return false;
				}
			}
		}
	}

	/**
	 * Return the exception stack : this is the stack elements between
	 * the place the last exception was thrown and the place it was
	 * caught, or an empty array if not available.
	 * Set `fullStack` parameter to true in order to return the full exception stack.
	 * May not work if catch type was a derivative from `haxe.Exception`.
	 * 
	 * @param bool $fullStack
	 * 
	 * @return StackItem[]|\Array_hx
	 */
	public static function exceptionStack ($fullStack = false) {
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:63: lines 63-66
		if ($fullStack === null) {
			$fullStack = false;
		}
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:64: characters 3-85
		$eStack = NativeStackTrace::toHaxe(NativeStackTrace::exceptionStack());
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:65: characters 10-71
		return ($fullStack ? $eStack : CallStack_Impl_::subtract($eStack, CallStack_Impl_::callStack()));
	}

	/**
	 * @param \StringBuf $b
	 * @param StackItem $s
	 * 
	 * @return void
	 */
	public static function itemToString ($b, $s) {
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:156: lines 156-183
		$__hx__switch = ($s->index);
		if ($__hx__switch === 0) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:158: characters 5-26
			$b->add("a C function");
		} else if ($__hx__switch === 1) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:159: characters 16-17
			$m = $s->params[0];
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:160: characters 5-21
			$b->add("module ");
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:161: characters 5-13
			$b->add($m);
		} else if ($__hx__switch === 2) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:162: characters 17-18
			$s1 = $s->params[0];
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:162: characters 20-24
			$file = $s->params[1];
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:162: characters 26-30
			$line = $s->params[2];
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:162: characters 32-35
			$col = $s->params[3];
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:163: lines 163-166
			if ($s1 !== null) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:164: characters 6-24
				CallStack_Impl_::itemToString($b, $s1);
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:165: characters 6-17
				$b->add(" (");
			}
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:167: characters 5-16
			$b->add($file);
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:168: characters 5-20
			$b->add(" line ");
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:169: characters 5-16
			$b->add($line);
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:170: lines 170-173
			if ($col !== null) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:171: characters 6-23
				$b->add(" column ");
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:172: characters 6-16
				$b->add($col);
			}
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:174: lines 174-175
			if ($s1 !== null) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:175: characters 6-16
				$b->add(")");
			}
		} else if ($__hx__switch === 3) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:176: characters 16-21
			$cname = $s->params[0];
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:176: characters 23-27
			$meth = $s->params[1];
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:177: characters 5-47
			$b->add(($cname === null ? "<unknown>" : $cname));
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:178: characters 5-15
			$b->add(".");
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:179: characters 5-16
			$b->add($meth);
		} else if ($__hx__switch === 4) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:180: characters 23-24
			$n = $s->params[0];
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:181: characters 5-30
			$b->add("local function #");
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:182: characters 5-13
			$b->add($n);
		}
	}

	/**
	 * Returns a range of entries of current stack from the beginning to the the
	 * common part of this and `stack`.
	 * 
	 * @param StackItem[]|\Array_hx $this
	 * @param StackItem[]|\Array_hx $stack
	 * 
	 * @return StackItem[]|\Array_hx
	 */
	public static function subtract ($this1, $stack) {
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:85: characters 3-23
		$startIndex = -1;
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:86: characters 3-14
		$i = -1;
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:87: lines 87-100
		while (++$i < $this1->length) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:88: characters 13-17
			$_g = 0;
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:88: characters 17-29
			$_g1 = $stack->length;
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:88: lines 88-98
			while ($_g < $_g1) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:88: characters 13-29
				$j = $_g++;
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:89: lines 89-97
				if (CallStack_Impl_::equalItems(($this1->arr[$i] ?? null), ($stack->arr[$j] ?? null))) {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:90: lines 90-92
					if ($startIndex < 0) {
						#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:91: characters 7-21
						$startIndex = $i;
					}
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:93: characters 6-9
					++$i;
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:94: characters 6-32
					if ($i >= $this1->length) {
						#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:94: characters 27-32
						break;
					}
				} else {
					#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:96: characters 6-21
					$startIndex = -1;
				}
			}
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:99: characters 4-29
			if ($startIndex >= 0) {
				#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:99: characters 24-29
				break;
			}
		}
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:101: characters 10-60
		if ($startIndex >= 0) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:101: characters 28-53
			return $this1->slice(0, $startIndex);
		} else {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:101: characters 56-60
			return $this1;
		}
	}

	/**
	 * Returns a representation of the stack as a printable string.
	 * 
	 * @param StackItem[]|\Array_hx $stack
	 * 
	 * @return string
	 */
	public static function toString ($stack) {
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:72: characters 3-27
		$b = new \StringBuf();
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:73: lines 73-76
		$_g = 0;
		$_g1 = $stack;
		while ($_g < $_g1->length) {
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:73: characters 8-9
			$s = ($_g1->arr[$_g] ?? null);
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:73: lines 73-76
			++$_g;
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:74: characters 4-27
			$b->add("\x0ACalled from ");
			#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:75: characters 4-22
			CallStack_Impl_::itemToString($b, $s);
		}
		#C:\HaxeToolkit\haxe\std/haxe/CallStack.hx:77: characters 3-22
		return $b->b;
	}
}

Boot::registerClass(CallStack_Impl_::class, 'haxe._CallStack.CallStack_Impl_');
