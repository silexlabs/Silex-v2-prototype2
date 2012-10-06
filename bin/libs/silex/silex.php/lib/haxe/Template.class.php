<?php

class haxe_Template {
	public function __construct($str) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("haxe.Template::new");
		$»spos = $GLOBALS['%s']->length;
		$tokens = $this->parseTokens($str);
		$this->expr = $this->parseBlock($tokens);
		if(!$tokens->isEmpty()) {
			throw new HException("Unexpected '" . Std::string($tokens->first()->s) . "'");
		}
		$GLOBALS['%s']->pop();
	}}
	public function run($e) {
		$GLOBALS['%s']->push("haxe.Template::run");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($e);
		switch($»t->index) {
		case 0:
		$v = $»t->params[0];
		{
			$this->buf->add(Std::string($this->resolve($v)));
		}break;
		case 1:
		$e1 = $»t->params[0];
		{
			$this->buf->add(Std::string(call_user_func($e1)));
		}break;
		case 2:
		$eelse = $»t->params[2]; $eif = $»t->params[1]; $e1 = $»t->params[0];
		{
			$v = call_user_func($e1);
			if($v === null || _hx_equal($v, false)) {
				if($eelse !== null) {
					$this->run($eelse);
				}
			} else {
				$this->run($eif);
			}
		}break;
		case 3:
		$str = $»t->params[0];
		{
			$this->buf->add($str);
		}break;
		case 4:
		$l = $»t->params[0];
		{
			if(null == $l) throw new HException('null iterable');
			$»it = $l->iterator();
			while($»it->hasNext()) {
				$e1 = $»it->next();
				$this->run($e1);
			}
		}break;
		case 5:
		$loop = $»t->params[1]; $e1 = $»t->params[0];
		{
			$v = call_user_func($e1);
			try {
				$x = $v->iterator();
				if(_hx_field($x, "hasNext") === null) {
					throw new HException(null);
				}
				$v = $x;
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e2 = $_ex_;
				{
					$GLOBALS['%e'] = new _hx_array(array());
					while($GLOBALS['%s']->length >= $»spos) {
						$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
					}
					$GLOBALS['%s']->push($GLOBALS['%e'][0]);
					try {
						if(_hx_field($v, "hasNext") === null) {
							throw new HException(null);
						}
					}catch(Exception $»e) {
						$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
						$e3 = $_ex_;
						{
							$GLOBALS['%e'] = new _hx_array(array());
							while($GLOBALS['%s']->length >= $»spos) {
								$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
							}
							$GLOBALS['%s']->push($GLOBALS['%e'][0]);
							throw new HException("Cannot iter on " . Std::string($v));
						}
					}
				}
			}
			$this->stack->push($this->context);
			$v1 = $v;
			$»it = $v1;
			while($»it->hasNext()) {
				$ctx = $»it->next();
				$this->context = $ctx;
				$this->run($loop);
			}
			$this->context = $this->stack->pop();
		}break;
		case 6:
		$params = $»t->params[1]; $m = $»t->params[0];
		{
			$v = Reflect::field($this->macros, $m);
			$pl = new _hx_array(array());
			$old = $this->buf;
			$pl->push((isset($this->resolve) ? $this->resolve: array($this, "resolve")));
			if(null == $params) throw new HException('null iterable');
			$»it = $params->iterator();
			while($»it->hasNext()) {
				$p = $»it->next();
				$»t2 = ($p);
				switch($»t2->index) {
				case 0:
				$v1 = $»t2->params[0];
				{
					$pl->push($this->resolve($v1));
				}break;
				default:{
					$this->buf = new StringBuf();
					$this->run($p);
					$pl->push($this->buf->b);
				}break;
				}
			}
			$this->buf = $old;
			try {
				$this->buf->add(Std::string(Reflect::callMethod($this->macros, $v, $pl)));
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e1 = $_ex_;
				{
					$GLOBALS['%e'] = new _hx_array(array());
					while($GLOBALS['%s']->length >= $»spos) {
						$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
					}
					$GLOBALS['%s']->push($GLOBALS['%e'][0]);
					$plstr = haxe_Template_0($this, $e, $e1, $m, $old, $params, $pl, $v);
					$msg = "Macro call " . $m . "(" . $plstr . ") failed (" . Std::string($e1) . ")";
					throw new HException($msg);
				}
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function makeExpr2($l) {
		$GLOBALS['%s']->push("haxe.Template::makeExpr2");
		$»spos = $GLOBALS['%s']->length;
		$p = $l->pop();
		if($p === null) {
			throw new HException("<eof>");
		}
		if($p->s) {
			$»tmp = $this->makeConst($p->p);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		switch($p->p) {
		case "(":{
			$e1 = $this->makeExpr($l);
			$p1 = $l->pop();
			if($p1 === null || $p1->s) {
				throw new HException($p1->p);
			}
			if($p1->p === ")") {
				$GLOBALS['%s']->pop();
				return $e1;
			}
			$e2 = $this->makeExpr($l);
			$p2 = $l->pop();
			if($p2 === null || $p2->p !== ")") {
				throw new HException($p2->p);
			}
			{
				$»tmp = haxe_Template_1($this, $e1, $e2, $l, $p, $p1, $p2);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}break;
		case "!":{
			$e = $this->makeExpr($l);
			{
				$»tmp = array(new _hx_lambda(array(&$e, &$l, &$p), "haxe_Template_2"), 'execute');
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}break;
		case "-":{
			$e = $this->makeExpr($l);
			{
				$»tmp = array(new _hx_lambda(array(&$e, &$l, &$p), "haxe_Template_3"), 'execute');
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}break;
		}
		throw new HException($p->p);
		$GLOBALS['%s']->pop();
	}
	public function makeExpr($l) {
		$GLOBALS['%s']->push("haxe.Template::makeExpr");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->makePath($this->makeExpr2($l), $l);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function makePath($e, $l) {
		$GLOBALS['%s']->push("haxe.Template::makePath");
		$»spos = $GLOBALS['%s']->length;
		$p = $l->first();
		if($p === null || $p->p !== ".") {
			$GLOBALS['%s']->pop();
			return $e;
		}
		$l->pop();
		$field = $l->pop();
		if($field === null || !$field->s) {
			throw new HException($field->p);
		}
		$f = $field->p;
		haxe_Template::$expr_trim->match($f);
		$f = haxe_Template::$expr_trim->matched(1);
		{
			$»tmp = $this->makePath(array(new _hx_lambda(array(&$e, &$f, &$field, &$l, &$p), "haxe_Template_4"), 'execute'), $l);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function makeConst($v) {
		$GLOBALS['%s']->push("haxe.Template::makeConst");
		$»spos = $GLOBALS['%s']->length;
		haxe_Template::$expr_trim->match($v);
		$v = haxe_Template::$expr_trim->matched(1);
		if(_hx_char_code_at($v, 0) === 34) {
			$str = _hx_substr($v, 1, strlen($v) - 2);
			{
				$»tmp = array(new _hx_lambda(array(&$str, &$v), "haxe_Template_5"), 'execute');
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		if(haxe_Template::$expr_int->match($v)) {
			$i = Std::parseInt($v);
			{
				$»tmp = array(new _hx_lambda(array(&$i, &$v), "haxe_Template_6"), 'execute');
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		if(haxe_Template::$expr_float->match($v)) {
			$f = Std::parseFloat($v);
			{
				$»tmp = array(new _hx_lambda(array(&$f, &$v), "haxe_Template_7"), 'execute');
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		$me = $this;
		{
			$»tmp = array(new _hx_lambda(array(&$me, &$v), "haxe_Template_8"), 'execute');
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function parseExpr($data) {
		$GLOBALS['%s']->push("haxe.Template::parseExpr");
		$»spos = $GLOBALS['%s']->length;
		$l = new HList();
		$expr = $data;
		while(haxe_Template::$expr_splitter->match($data)) {
			$p = haxe_Template::$expr_splitter->matchedPos();
			$k = $p->pos + $p->len;
			if($p->pos !== 0) {
				$l->add(_hx_anonymous(array("p" => _hx_substr($data, 0, $p->pos), "s" => true)));
			}
			$p1 = haxe_Template::$expr_splitter->matched(0);
			$l->add(_hx_anonymous(array("p" => $p1, "s" => _hx_index_of($p1, "\"", null) >= 0)));
			$data = haxe_Template::$expr_splitter->matchedRight();
			unset($p1,$p,$k);
		}
		if(strlen($data) !== 0) {
			$l->add(_hx_anonymous(array("p" => $data, "s" => true)));
		}
		$e = null;
		try {
			$e = $this->makeExpr($l);
			if(!$l->isEmpty()) {
				throw new HException($l->first()->p);
			}
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			if(is_string($s = $_ex_)){
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("Unexpected '" . $s . "' in " . $expr);
			} else throw $»e;;
		}
		{
			$»tmp = array(new _hx_lambda(array(&$data, &$e, &$expr, &$l, &$s), "haxe_Template_9"), 'execute');
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function parse($tokens) {
		$GLOBALS['%s']->push("haxe.Template::parse");
		$»spos = $GLOBALS['%s']->length;
		$t = $tokens->pop();
		$p = $t->p;
		if($t->s) {
			$»tmp = haxe__Template_TemplateExpr::OpStr($p);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		if($t->l !== null) {
			$pe = new HList();
			{
				$_g = 0; $_g1 = $t->l;
				while($_g < $_g1->length) {
					$p1 = $_g1[$_g];
					++$_g;
					$pe->add($this->parseBlock($this->parseTokens($p1)));
					unset($p1);
				}
			}
			{
				$»tmp = haxe__Template_TemplateExpr::OpMacro($p, $pe);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		if(_hx_substr($p, 0, 3) === "if ") {
			$p = _hx_substr($p, 3, strlen($p) - 3);
			$e = $this->parseExpr($p);
			$eif = $this->parseBlock($tokens);
			$t1 = $tokens->first();
			$eelse = null;
			if($t1 === null) {
				throw new HException("Unclosed 'if'");
			}
			if($t1->p === "end") {
				$tokens->pop();
				$eelse = null;
			} else {
				if($t1->p === "else") {
					$tokens->pop();
					$eelse = $this->parseBlock($tokens);
					$t1 = $tokens->pop();
					if($t1 === null || $t1->p !== "end") {
						throw new HException("Unclosed 'else'");
					}
				} else {
					$t1->p = _hx_substr($t1->p, 4, strlen($t1->p) - 4);
					$eelse = $this->parse($tokens);
				}
			}
			{
				$»tmp = haxe__Template_TemplateExpr::OpIf($e, $eif, $eelse);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		if(_hx_substr($p, 0, 8) === "foreach ") {
			$p = _hx_substr($p, 8, strlen($p) - 8);
			$e = $this->parseExpr($p);
			$efor = $this->parseBlock($tokens);
			$t1 = $tokens->pop();
			if($t1 === null || $t1->p !== "end") {
				throw new HException("Unclosed 'foreach'");
			}
			{
				$»tmp = haxe__Template_TemplateExpr::OpForeach($e, $efor);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		if(haxe_Template::$expr_splitter->match($p)) {
			$»tmp = haxe__Template_TemplateExpr::OpExpr($this->parseExpr($p));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$»tmp = haxe__Template_TemplateExpr::OpVar($p);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function parseBlock($tokens) {
		$GLOBALS['%s']->push("haxe.Template::parseBlock");
		$»spos = $GLOBALS['%s']->length;
		$l = new HList();
		while(true) {
			$t = $tokens->first();
			if($t === null) {
				break;
			}
			if(!$t->s && ($t->p === "end" || $t->p === "else" || _hx_substr($t->p, 0, 7) === "elseif ")) {
				break;
			}
			$l->add($this->parse($tokens));
			unset($t);
		}
		if($l->length === 1) {
			$»tmp = $l->first();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$»tmp = haxe__Template_TemplateExpr::OpBlock($l);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function parseTokens($data) {
		$GLOBALS['%s']->push("haxe.Template::parseTokens");
		$»spos = $GLOBALS['%s']->length;
		$tokens = new HList();
		while(haxe_Template::$splitter->match($data)) {
			$p = haxe_Template::$splitter->matchedPos();
			if($p->pos > 0) {
				$tokens->add(_hx_anonymous(array("p" => _hx_substr($data, 0, $p->pos), "s" => true, "l" => null)));
			}
			if(_hx_char_code_at($data, $p->pos) === 58) {
				$tokens->add(_hx_anonymous(array("p" => _hx_substr($data, $p->pos + 2, $p->len - 4), "s" => false, "l" => null)));
				$data = haxe_Template::$splitter->matchedRight();
				continue;
			}
			$parp = $p->pos + $p->len;
			$npar = 1;
			while($npar > 0) {
				$c = _hx_char_code_at($data, $parp);
				if($c === 40) {
					$npar++;
				} else {
					if($c === 41) {
						$npar--;
					} else {
						if($c === null) {
							throw new HException("Unclosed macro parenthesis");
						}
					}
				}
				$parp++;
				unset($c);
			}
			$params = _hx_explode(",", _hx_substr($data, $p->pos + $p->len, $parp - ($p->pos + $p->len) - 1));
			$tokens->add(_hx_anonymous(array("p" => haxe_Template::$splitter->matched(2), "s" => false, "l" => $params)));
			$data = _hx_substr($data, $parp, strlen($data) - $parp);
			unset($parp,$params,$p,$npar);
		}
		if(strlen($data) > 0) {
			$tokens->add(_hx_anonymous(array("p" => $data, "s" => true, "l" => null)));
		}
		{
			$GLOBALS['%s']->pop();
			return $tokens;
		}
		$GLOBALS['%s']->pop();
	}
	public function resolve($v) {
		$GLOBALS['%s']->push("haxe.Template::resolve");
		$»spos = $GLOBALS['%s']->length;
		if(_hx_has_field($this->context, $v)) {
			$»tmp = Reflect::field($this->context, $v);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		if(null == $this->stack) throw new HException('null iterable');
		$»it = $this->stack->iterator();
		while($»it->hasNext()) {
			$ctx = $»it->next();
			if(_hx_has_field($ctx, $v)) {
				$»tmp = Reflect::field($ctx, $v);
				$GLOBALS['%s']->pop();
				return $»tmp;
				unset($»tmp);
			}
		}
		if($v === "__current__") {
			$»tmp = $this->context;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$»tmp = Reflect::field(haxe_Template::$globals, $v);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function execute($context, $macros = null) {
		$GLOBALS['%s']->push("haxe.Template::execute");
		$»spos = $GLOBALS['%s']->length;
		$this->macros = (($macros === null) ? _hx_anonymous(array()) : $macros);
		$this->context = $context;
		$this->stack = new HList();
		$this->buf = new StringBuf();
		$this->run($this->expr);
		{
			$»tmp = $this->buf->b;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $buf;
	public $stack;
	public $macros;
	public $context;
	public $expr;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $splitter;
	static $expr_splitter;
	static $expr_trim;
	static $expr_int;
	static $expr_float;
	static function globals() { $»args = func_get_args(); return call_user_func_array(self::$globals, $»args); }
	static $globals;
	function __toString() { return 'haxe.Template'; }
}
haxe_Template::$splitter = new EReg("(::[A-Za-z0-9_ ()&|!+=/><*.\"-]+::|\\\$\\\$([A-Za-z0-9_-]+)\\()", "");
haxe_Template::$expr_splitter = new EReg("(\\(|\\)|[ \x0D\x0A\x09]*\"[^\"]*\"[ \x0D\x0A\x09]*|[!+=/><*.&|-]+)", "");
haxe_Template::$expr_trim = new EReg("^[ ]*([^ ]+)[ ]*\$", "");
haxe_Template::$expr_int = new EReg("^[0-9]+\$", "");
haxe_Template::$expr_float = new EReg("^([+-]?)(?=\\d|,\\d)\\d*(,\\d*)?([Ee]([+-]?\\d+))?\$", "");
haxe_Template::$globals = _hx_anonymous(array());
function haxe_Template_0(&$»this, &$e, &$e1, &$m, &$old, &$params, &$pl, &$v) {
	$»spos = $GLOBALS['%s']->length;
	try {
		return $pl->join(",");
	}catch(Exception $»e) {
		$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
		$e2 = $_ex_;
		{
			$GLOBALS['%e'] = new _hx_array(array());
			while($GLOBALS['%s']->length >= $»spos) {
				$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
			}
			$GLOBALS['%s']->push($GLOBALS['%e'][0]);
			return "???";
		}
	}
}
function haxe_Template_1(&$»this, &$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	switch($p1->p) {
	case "+":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_10"), 'execute');
	}break;
	case "-":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_11"), 'execute');
	}break;
	case "*":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_12"), 'execute');
	}break;
	case "/":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_13"), 'execute');
	}break;
	case ">":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_14"), 'execute');
	}break;
	case "<":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_15"), 'execute');
	}break;
	case ">=":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_16"), 'execute');
	}break;
	case "<=":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_17"), 'execute');
	}break;
	case "==":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_18"), 'execute');
	}break;
	case "!=":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_19"), 'execute');
	}break;
	case "&&":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_20"), 'execute');
	}break;
	case "||":{
		return array(new _hx_lambda(array(&$e1, &$e2, &$l, &$p, &$p1, &$p2), "haxe_Template_21"), 'execute');
	}break;
	default:{
		throw new HException("Unknown operation " . $p1->p);
	}break;
	}
}
function haxe_Template_2(&$e, &$l, &$p) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::makeExpr2@295");
		$»spos2 = $GLOBALS['%s']->length;
		$v = call_user_func($e);
		{
			$»tmp = $v === null || _hx_equal($v, false);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_3(&$e, &$l, &$p) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::makeExpr2@301");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = -call_user_func($e);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_4(&$e, &$f, &$field, &$l, &$p) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::makePath@253");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = Reflect::field(call_user_func($e), $f);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_5(&$str, &$v) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::makeConst@228");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $str;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_6(&$i, &$v) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::makeConst@232");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $i;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_7(&$f, &$v) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::makeConst@236");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $f;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_8(&$me, &$v) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::makeConst@239");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = $me->resolve($v);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_9(&$data, &$e, &$expr, &$l, &$s) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::parseExpr@214");
		$»spos2 = $GLOBALS['%s']->length;
		try {
			{
				$»tmp = call_user_func($e);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$exc = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos2) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("Error : " . Std::string($exc) . " in " . $expr);
			}
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_10(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@279");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = _hx_add(call_user_func($e1), call_user_func($e2));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_11(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@280");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) - call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_12(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@281");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) * call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_13(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@282");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) / call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_14(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@283");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) > call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_15(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@284");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) < call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_16(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@285");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) >= call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_17(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@286");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) <= call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_18(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@287");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = _hx_equal(call_user_func($e1), call_user_func($e2));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_19(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@288");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = !_hx_equal(call_user_func($e1), call_user_func($e2));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_20(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@289");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) && call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Template_21(&$e1, &$e2, &$l, &$p, &$p1, &$p2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Template::execute@290");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func($e1) || call_user_func($e2);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
