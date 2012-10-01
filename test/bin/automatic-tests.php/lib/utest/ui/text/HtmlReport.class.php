<?php

class utest_ui_text_HtmlReport implements utest_ui_common_IReport{
	public function __construct($runner, $outputHandler = null, $traceRedirected = null) {
		if(!php_Boot::$skip_constructor) {
		if($traceRedirected === null) {
			$traceRedirected = true;
		}
		$this->aggregator = new utest_ui_common_ResultAggregator($runner, true);
		$runner->onStart->add((isset($this->start) ? $this->start: array($this, "start")));
		$this->aggregator->onComplete->add((isset($this->complete) ? $this->complete: array($this, "complete")));
		if(null === $outputHandler) {
			$this->setHandler((isset($this->_handler) ? $this->_handler: array($this, "_handler")));
		} else {
			$this->setHandler($outputHandler);
		}
		if($traceRedirected) {
			$this->redirectTrace();
		}
		$this->displaySuccessResults = utest_ui_common_SuccessResultsDisplayMode::$AlwaysShowSuccessResults;
		$this->displayHeader = utest_ui_common_HeaderDisplayMode::$AlwaysShowHeader;
	}}
	public function _handler($report) {
		php_Lib::hprint($report->getHtml(null));
	}
	public function wrapHtml($title, $s) {
		return "<head>\x0A<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />\x0A<title>" . $title . "</title>\x0D\x0A\x09\x09\x09<style type=\"text/css\">" . $this->cssStyle() . "</style>\x0D\x0A\x09\x09\x09<script type=\"text/javascript\">\x0A" . $this->jsScript() . "\x0A</script>\x0A</head>\x0D\x0A\x09\x09\x09<body>\x0A" . $s . "\x0A</body>\x0A</html>";
	}
	public function jsScript() {
		return "function utestTooltip(ref, text) {\x0D\x0A\x09var el = document.getElementById(\"utesttip\");\x0D\x0A\x09if(!el) {\x0D\x0A\x09\x09var el = document.createElement(\"div\")\x0D\x0A\x09\x09el.id = \"utesttip\";\x0D\x0A\x09\x09el.style.position = \"absolute\";\x0D\x0A\x09\x09document.body.appendChild(el)\x0D\x0A\x09}\x0D\x0A\x09var p = utestFindPos(ref);\x0D\x0A\x09el.style.left = (4 + p[0]) + \"px\";\x0D\x0A\x09el.style.top = (p[1] - 1) + \"px\";\x0D\x0A\x09el.innerHTML =  text;\x0D\x0A}\x0D\x0A\x0D\x0Afunction utestFindPos(el) {\x0D\x0A\x09var left = 0;\x0D\x0A\x09var top = 0;\x0D\x0A\x09do {\x0D\x0A\x09\x09left += el.offsetLeft;\x0D\x0A\x09\x09top += el.offsetTop;\x0D\x0A\x09} while(el = el.offsetParent)\x0D\x0A\x09return [left, top];\x0D\x0A}\x0D\x0A\x0D\x0Afunction utestRemoveTooltip() {\x0D\x0A\x09var el = document.getElementById(\"utesttip\")\x0D\x0A\x09if(el)\x0D\x0A\x09\x09document.body.removeChild(el)\x0D\x0A}";
	}
	public function cssStyle() {
		return "body, dd, dt {\x0D\x0A\x09font-family: Verdana, Arial, Sans-serif;\x0D\x0A\x09font-size: 12px;\x0D\x0A}\x0D\x0Adl {\x0D\x0A\x09width: 180px;\x0D\x0A}\x0D\x0Add, dt {\x0D\x0A\x09margin : 0;\x0D\x0A\x09padding : 2px 5px;\x0D\x0A\x09border-top: 1px solid #f0f0f0;\x0D\x0A\x09border-left: 1px solid #f0f0f0;\x0D\x0A\x09border-right: 1px solid #CCCCCC;\x0D\x0A\x09border-bottom: 1px solid #CCCCCC;\x0D\x0A}\x0D\x0Add.value {\x0D\x0A\x09text-align: center;\x0D\x0A\x09background-color: #eeeeee;\x0D\x0A}\x0D\x0Adt {\x0D\x0A\x09text-align: left;\x0D\x0A\x09background-color: #e6e6e6;\x0D\x0A\x09float: left;\x0D\x0A\x09width: 100px;\x0D\x0A}\x0D\x0A\x0D\x0Ah1, h2, h3, h4, h5, h6 {\x0D\x0A\x09margin: 0;\x0D\x0A\x09padding: 0;\x0D\x0A}\x0D\x0A\x0D\x0Ah1 {\x0D\x0A\x09text-align: center;\x0D\x0A\x09font-weight: bold;\x0D\x0A\x09padding: 5px 0 4px 0;\x0D\x0A\x09font-family: Arial, Sans-serif;\x0D\x0A\x09font-size: 18px;\x0D\x0A\x09border-top: 1px solid #f0f0f0;\x0D\x0A\x09border-left: 1px solid #f0f0f0;\x0D\x0A\x09border-right: 1px solid #CCCCCC;\x0D\x0A\x09border-bottom: 1px solid #CCCCCC;\x0D\x0A\x09margin: 0 2px 0px 2px;\x0D\x0A}\x0D\x0A\x0D\x0Ah2 {\x0D\x0A\x09font-weight: bold;\x0D\x0A\x09padding: 2px 0 2px 8px;\x0D\x0A\x09font-family: Arial, Sans-serif;\x0D\x0A\x09font-size: 13px;\x0D\x0A\x09border-top: 1px solid #f0f0f0;\x0D\x0A\x09border-left: 1px solid #f0f0f0;\x0D\x0A\x09border-right: 1px solid #CCCCCC;\x0D\x0A\x09border-bottom: 1px solid #CCCCCC;\x0D\x0A\x09margin: 0 0 0px 0;\x0D\x0A\x09background-color: #FFFFFF;\x0D\x0A\x09color: #777777;\x0D\x0A}\x0D\x0A\x0D\x0Ah2.classname {\x0D\x0A\x09color: #000000;\x0D\x0A}\x0D\x0A\x0D\x0A.okbg {\x0D\x0A\x09background-color: #66FF55;\x0D\x0A}\x0D\x0A.errorbg {\x0D\x0A\x09background-color: #CC1100;\x0D\x0A}\x0D\x0A.failurebg {\x0D\x0A\x09background-color: #EE3322;\x0D\x0A}\x0D\x0A.warnbg {\x0D\x0A\x09background-color: #FFCC99;\x0D\x0A}\x0D\x0A.headerinfo {\x0D\x0A\x09text-align: right;\x0D\x0A\x09font-size: 11px;\x0D\x0A\x09font - color: 0xCCCCCC;\x0D\x0A\x09margin: 0 2px 5px 2px;\x0D\x0A\x09border-left: 1px solid #f0f0f0;\x0D\x0A\x09border-right: 1px solid #CCCCCC;\x0D\x0A\x09border-bottom: 1px solid #CCCCCC;\x0D\x0A\x09padding: 2px;\x0D\x0A}\x0D\x0A\x0D\x0Ali {\x0D\x0A\x09padding: 4px;\x0D\x0A\x09margin: 2px;\x0D\x0A\x09border-top: 1px solid #f0f0f0;\x0D\x0A\x09border-left: 1px solid #f0f0f0;\x0D\x0A\x09border-right: 1px solid #CCCCCC;\x0D\x0A\x09border-bottom: 1px solid #CCCCCC;\x0D\x0A\x09background-color: #e6e6e6;\x0D\x0A}\x0D\x0A\x0D\x0Ali.fixture {\x0D\x0A\x09background-color: #f6f6f6;\x0D\x0A\x09padding-bottom: 6px;\x0D\x0A}\x0D\x0A\x0D\x0Adiv.fixturedetails {\x0D\x0A\x09padding-left: 108px;\x0D\x0A}\x0D\x0A\x0D\x0Aul {\x0D\x0A\x09padding: 0;\x0D\x0A\x09margin: 6px 0 0 0;\x0D\x0A\x09list-style-type: none;\x0D\x0A}\x0D\x0A\x0D\x0Aol {\x0D\x0A\x09padding: 0 0 0 28px;\x0D\x0A\x09margin: 0px 0 0 0;\x0D\x0A}\x0D\x0A\x0D\x0A.statnumbers {\x0D\x0A\x09padding: 2px 8px;\x0D\x0A}\x0D\x0A\x0D\x0A.fixtureresult {\x0D\x0A\x09width: 100px;\x0D\x0A\x09text-align: center;\x0D\x0A\x09display: block;\x0D\x0A\x09float: left;\x0D\x0A\x09font-weight: bold;\x0D\x0A\x09padding: 1px;\x0D\x0A\x09margin: 0 0 0 0;\x0D\x0A}\x0D\x0A\x0D\x0A.testoutput {\x0D\x0A\x09border: 1px dashed #CCCCCC;\x0D\x0A\x09margin: 4px 0 0 0;\x0D\x0A\x09padding: 4px 8px;\x0D\x0A\x09background-color: #eeeeee;\x0D\x0A}\x0D\x0A\x0D\x0Aspan.tracepos, span.traceposempty {\x0D\x0A\x09display: block;\x0D\x0A\x09float: left;\x0D\x0A\x09font-weight: bold;\x0D\x0A\x09font-size: 9px;\x0D\x0A\x09width: 170px;\x0D\x0A\x09margin: 2px 0 0 2px;\x0D\x0A}\x0D\x0A\x0D\x0Aspan.tracepos:hover {\x0D\x0A\x09cursor : pointer;\x0D\x0A\x09background-color: #ffff99;\x0D\x0A}\x0D\x0A\x0D\x0Aspan.tracemsg {\x0D\x0A\x09display: block;\x0D\x0A\x09margin-left: 180px;\x0D\x0A\x09background-color: #eeeeee;\x0D\x0A\x09padding: 7px;\x0D\x0A}\x0D\x0A\x0D\x0Aspan.tracetime {\x0D\x0A\x09display: block;\x0D\x0A\x09float: right;\x0D\x0A\x09margin: 2px;\x0D\x0A\x09font-size: 9px;\x0D\x0A\x09color: #777777;\x0D\x0A}\x0D\x0A\x0D\x0A\x0D\x0Adiv.trace ol {\x0D\x0A\x09padding: 0 0 0 40px;\x0D\x0A\x09color: #777777;\x0D\x0A}\x0D\x0A\x0D\x0Adiv.trace li {\x0D\x0A\x09padding: 0;\x0D\x0A}\x0D\x0A\x0D\x0Adiv.trace li div.li {\x0D\x0A\x09color: #000000;\x0D\x0A}\x0D\x0A\x0D\x0Adiv.trace h2 {\x0D\x0A\x09margin: 0 2px 0px 2px;\x0D\x0A\x09padding-left: 4px;\x0D\x0A}\x0D\x0A\x0D\x0A.tracepackage {\x0D\x0A\x09color: #777777;\x0D\x0A\x09font-weight: normal;\x0D\x0A}\x0D\x0A\x0D\x0A.clr {\x0D\x0A\x09clear: both;\x0D\x0A}\x0D\x0A\x0D\x0A#utesttip {\x0D\x0A\x09margin-top: -3px;\x0D\x0A\x09margin-left: 170px;\x0D\x0A\x09font-size: 9px;\x0D\x0A}\x0D\x0A\x0D\x0A#utesttip li {\x0D\x0A\x09margin: 0;\x0D\x0A\x09background-color: #ffff99;\x0D\x0A\x09padding: 2px 4px;\x0D\x0A\x09border: 0;\x0D\x0A\x09border-bottom: 1px dashed #ffff33;\x0D\x0A}";
	}
	public function formatTime($t) {
		return _hx_string_rec(Math::round($t * 1000), "") . " ms";
	}
	public function complete($result) {
		$this->result = $result;
		$this->handler($this);
		$this->restoreTrace();
	}
	public $result;
	public function getHtml($title = null) {
		if(null === $title) {
			$title = "utest: " . utest_ui_text_HtmlReport::$platform;
		}
		$s = $this->getAll();
		if("" === $s) {
			return "";
		} else {
			return $this->wrapHtml($title, $s);
		}
	}
	public function getAll() {
		if(!utest_ui_common_ReportTools::hasOutput($this, $this->result->stats)) {
			return "";
		} else {
			return $this->getHeader() . $this->getTrace() . $this->getResults();
		}
	}
	public function getResults() {
		$buf = new StringBuf();
		$this->addPackages($buf, $this->result, $this->result->stats->isOk);
		return $buf->b;
	}
	public function getTrace() {
		$buf = new StringBuf();
		if($this->_traces === null || $this->_traces->length === 0) {
			return "";
		}
		$buf->add("<div class=\"trace\"><h2>traces</h2><ol>");
		{
			$_g = 0; $_g1 = $this->_traces;
			while($_g < $_g1->length) {
				$t = $_g1[$_g];
				++$_g;
				$buf->add("<li><div class=\"li\">");
				$stack = str_replace("'", "\\'", $this->formatStack($t->stack, false));
				$method = "<span class=\"tracepackage\">" . $t->infos->className . "</span><br/>" . $t->infos->methodName . "(" . _hx_string_rec($t->infos->lineNumber, "") . ")";
				$buf->add("<span class=\"tracepos\" onmouseover=\"utestTooltip(this.parentNode, '" . $stack . "')\" onmouseout=\"utestRemoveTooltip()\">");
				$buf->add($method);
				$buf->add("</span><span class=\"tracetime\">");
				$buf->add("@ " . $this->formatTime($t->time));
				if(Math::round($t->delta * 1000) > 0) {
					$buf->add(", ~" . $this->formatTime($t->delta));
				}
				$buf->add("</span><span class=\"tracemsg\">");
				$buf->add(str_replace("\x0A", "<br/>\x0A", trim($t->msg)));
				$buf->add("</span><div class=\"clr\"></div></div></li>");
				unset($t,$stack,$method);
			}
		}
		$buf->add("</ol></div>");
		return $buf->b;
	}
	public function getHeader() {
		$buf = new StringBuf();
		if(!utest_ui_common_ReportTools::hasHeader($this, $this->result->stats)) {
			return "";
		}
		$end = haxe_Timer::stamp();
		$time = intval(($end - $this->startTime) * 1000) / 1000;
		$msg = "TEST OK";
		if($this->result->stats->hasErrors) {
			$msg = "TEST ERRORS";
		} else {
			if($this->result->stats->hasFailures) {
				$msg = "TEST FAILED";
			} else {
				if($this->result->stats->hasWarnings) {
					$msg = "WARNING REPORTED";
				}
			}
		}
		$buf->add("<h1 class=\"" . $this->cls($this->result->stats) . "bg header\">" . $msg . "</h1>\x0A");
		$buf->add("<div class=\"headerinfo\">");
		$this->resultNumbers($buf, $this->result->stats);
		$buf->add(" performed on <strong>" . utest_ui_text_HtmlReport::$platform . "</strong>, executed in <strong> " . _hx_string_rec($time, "") . " sec. </strong></div >\x0A ");
		return $buf->b;
	}
	public function addPackage($buf, $result, $name, $isOk) {
		if(utest_ui_common_ReportTools::skipResult($this, $result->stats, $isOk)) {
			return;
		}
		if($name === "" && $result->classNames(null)->length === 0) {
			return;
		}
		$buf->add("<li>");
		$buf->add("<h2>" . $name . "</h2>");
		$this->blockNumbers($buf, $result->stats);
		$buf->add("<ul>\x0A");
		{
			$_g = 0; $_g1 = $result->classNames(null);
			while($_g < $_g1->length) {
				$cname = $_g1[$_g];
				++$_g;
				$this->addClass($buf, $result->getClass($cname), $cname, $isOk);
				unset($cname);
			}
		}
		$buf->add("</ul>\x0A");
		$buf->add("</li>\x0A");
	}
	public function addPackages($buf, $result, $isOk) {
		if(utest_ui_common_ReportTools::skipResult($this, $result->stats, $isOk)) {
			return;
		}
		$buf->add("<ul id=\"utest-results-packages\">\x0A");
		{
			$_g = 0; $_g1 = $result->packageNames(false);
			while($_g < $_g1->length) {
				$name = $_g1[$_g];
				++$_g;
				$this->addPackage($buf, $result->getPackage($name), $name, $isOk);
				unset($name);
			}
		}
		$buf->add("</ul>\x0A");
	}
	public function addClass($buf, $result, $name, $isOk) {
		if(utest_ui_common_ReportTools::skipResult($this, $result->stats, $isOk)) {
			return;
		}
		$buf->add("<li>");
		$buf->add("<h2 class=\"classname\">" . $name . "</h2>");
		$this->blockNumbers($buf, $result->stats);
		$buf->add("<ul>\x0A");
		{
			$_g = 0; $_g1 = $result->methodNames(null);
			while($_g < $_g1->length) {
				$mname = $_g1[$_g];
				++$_g;
				$this->addFixture($buf, $result->get($mname), $mname, $isOk);
				unset($mname);
			}
		}
		$buf->add("</ul>\x0A");
		$buf->add("</li>\x0A");
	}
	public function getErrorStack($s, $e) {
		return $this->formatStack($s, null);
	}
	public function getErrorDescription($e) {
		return Std::string($e);
	}
	public function addFixture($buf, $result, $name, $isOk) {
		if(utest_ui_common_ReportTools::skipResult($this, $result->stats, $isOk)) {
			return;
		}
		$buf->add("<li class=\"fixture\"><div class=\"li\">");
		$buf->add("<span class=\"" . $this->cls($result->stats) . "bg fixtureresult\">");
		if($result->stats->isOk) {
			$buf->add("OK ");
		} else {
			if($result->stats->hasErrors) {
				$buf->add("ERROR ");
			} else {
				if($result->stats->hasFailures) {
					$buf->add("FAILURE ");
				} else {
					if($result->stats->hasWarnings) {
						$buf->add("WARNING ");
					}
				}
			}
		}
		$buf->add("</span>");
		$buf->add("<div class=\"fixturedetails\">");
		$buf->add("<strong>" . $name . "</strong>");
		$buf->add(": ");
		$this->resultNumbers($buf, $result->stats);
		$messages = new _hx_array(array());
		if(null == $result) throw new HException('null iterable');
		$»it = $result->iterator();
		while($»it->hasNext()) {
			$assertation = $»it->next();
			$»t = ($assertation);
			switch($»t->index) {
			case 0:
			$pos = $»t->params[0];
			{
			}break;
			case 1:
			$pos = $»t->params[1]; $msg = $»t->params[0];
			{
				$messages->push("<strong>line " . _hx_string_rec($pos->lineNumber, "") . "</strong>: <em>" . StringTools::htmlEscape($msg) . "</em>");
			}break;
			case 2:
			$s = $»t->params[1]; $e = $»t->params[0];
			{
				$messages->push("<strong>error</strong>: <em>" . $this->getErrorDescription($e) . "</em>\x0A<br/><strong>stack</strong>:" . $this->getErrorStack($s, $e));
			}break;
			case 3:
			$s = $»t->params[1]; $e = $»t->params[0];
			{
				$messages->push("<strong>setup error</strong>: " . $this->getErrorDescription($e) . "\x0A<br/><strong>stack</strong>:" . $this->getErrorStack($s, $e));
			}break;
			case 4:
			$s = $»t->params[1]; $e = $»t->params[0];
			{
				$messages->push("<strong>tear-down error</strong>: " . $this->getErrorDescription($e) . "\x0A<br/><strong>stack</strong>:" . $this->getErrorStack($s, $e));
			}break;
			case 5:
			$s = $»t->params[1]; $missedAsyncs = $»t->params[0];
			{
				$messages->push("<strong>missed async call(s)</strong>: " . _hx_string_rec($missedAsyncs, ""));
			}break;
			case 6:
			$s = $»t->params[1]; $e = $»t->params[0];
			{
				$messages->push("<strong>async error</strong>: " . $this->getErrorDescription($e) . "\x0A<br/><strong>stack</strong>:" . $this->getErrorStack($s, $e));
			}break;
			case 7:
			$msg = $»t->params[0];
			{
				$messages->push(StringTools::htmlEscape($msg));
			}break;
			}
		}
		if($messages->length > 0) {
			$buf->add("<div class=\"testoutput\">");
			$buf->add($messages->join("<br/>"));
			$buf->add("</div>\x0A");
		}
		$buf->add("</div>\x0A");
		$buf->add("</div></li>\x0A");
	}
	public function formatStack($stack, $addNL = null) {
		if($addNL === null) {
			$addNL = true;
		}
		$parts = new _hx_array(array());
		$nl = (($addNL) ? "\x0A" : "");
		$last = null;
		$count = 1;
		{
			$_g = 0; $_g1 = _hx_explode("\x0A", haxe_Stack::toString($stack));
			while($_g < $_g1->length) {
				$part = $_g1[$_g];
				++$_g;
				if(trim($part) === "") {
					continue;
				}
				if(-1 < _hx_index_of($part, "Called from utest.", null)) {
					continue;
				}
				if($part === $last) {
					$parts[$parts->length - 1] = $part . " (#" . _hx_string_rec(++$count, "") . ")";
				} else {
					$count = 1;
					$parts->push($last = $part);
				}
				unset($part);
			}
		}
		$s = "<ul><li>" . $parts->join("</li>" . $nl . "<li>") . "</li></ul>" . $nl;
		return "<div>" . $s . "</div>" . $nl;
	}
	public function blockNumbers($buf, $stats) {
		$buf->add("<div class=\"" . $this->cls($stats) . "bg statnumbers\">");
		$this->resultNumbers($buf, $stats);
		$buf->add("</div>");
	}
	public function resultNumbers($buf, $stats) {
		$numbers = new _hx_array(array());
		if($stats->assertations === 1) {
			$numbers->push("<strong>1</strong> test");
		} else {
			$numbers->push("<strong>" . _hx_string_rec($stats->assertations, "") . "</strong> tests");
		}
		if($stats->successes !== $stats->assertations) {
			if($stats->successes === 1) {
				$numbers->push("<strong>1</strong> pass");
			} else {
				if($stats->successes > 0) {
					$numbers->push("<strong>" . _hx_string_rec($stats->successes, "") . "</strong> passes");
				}
			}
		}
		if($stats->errors === 1) {
			$numbers->push("<strong>1</strong> error");
		} else {
			if($stats->errors > 0) {
				$numbers->push("<strong>" . _hx_string_rec($stats->errors, "") . "</strong> errors");
			}
		}
		if($stats->failures === 1) {
			$numbers->push("<strong>1</strong> failure");
		} else {
			if($stats->failures > 0) {
				$numbers->push("<strong>" . _hx_string_rec($stats->failures, "") . "</strong> failures");
			}
		}
		if($stats->warnings === 1) {
			$numbers->push("<strong>1</strong> warning");
		} else {
			if($stats->warnings > 0) {
				$numbers->push("<strong>" . _hx_string_rec($stats->warnings, "") . "</strong> warnings");
			}
		}
		$buf->add($numbers->join(", "));
	}
	public function cls($stats) {
		if($stats->hasErrors) {
			return "error";
		} else {
			if($stats->hasFailures) {
				return "failure";
			} else {
				if($stats->hasWarnings) {
					return "warn";
				} else {
					return "ok";
				}
			}
		}
	}
	public function start($e) {
		$this->startTime = haxe_Timer::stamp();
	}
	public $startTime;
	public function _trace($v, $infos = null) {
		$time = haxe_Timer::stamp();
		$delta = utest_ui_text_HtmlReport_0($this, $infos, $time, $v);
		$this->_traces->push(_hx_anonymous(array("msg" => StringTools::htmlEscape(Std::string($v)), "infos" => $infos, "time" => $time - $this->startTime, "delta" => $delta, "stack" => haxe_Stack::callStack())));
		$this->_traceTime = haxe_Timer::stamp();
	}
	public $_traceTime;
	public function restoreTrace() {
		if(!$this->traceRedirected) {
			return;
		}
		haxe_Log::$trace = $this->oldTrace;
	}
	public function redirectTrace() {
		if($this->traceRedirected) {
			return;
		}
		$this->_traces = new _hx_array(array());
		$this->oldTrace = haxe_Log::$trace;
		haxe_Log::$trace = (isset($this->_trace) ? $this->_trace: array($this, "_trace"));
	}
	public function setHandler($handler) {
		$this->handler = $handler;
	}
	public $_traces;
	public $oldTrace;
	public $aggregator;
	public $handler;
	public $displayHeader;
	public $displaySuccessResults;
	public $traceRedirected;
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
	static $platform = "php";
	function __toString() { return 'utest.ui.text.HtmlReport'; }
}
function utest_ui_text_HtmlReport_0(&$»this, &$infos, &$time, &$v) {
	if($»this->_traceTime === null) {
		return 0;
	} else {
		return $time - $»this->_traceTime;
	}
}
