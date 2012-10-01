<?php

class utest_ui_text_PlainTextReport implements utest_ui_common_IReport{
	public function __construct($runner, $outputHandler = null) {
		if(!php_Boot::$skip_constructor) {
		$this->aggregator = new utest_ui_common_ResultAggregator($runner, true);
		$runner->onStart->add((isset($this->start) ? $this->start: array($this, "start")));
		$this->aggregator->onComplete->add((isset($this->complete) ? $this->complete: array($this, "complete")));
		if(null !== $outputHandler) {
			$this->setHandler($outputHandler);
		}
		$this->displaySuccessResults = utest_ui_common_SuccessResultsDisplayMode::$AlwaysShowSuccessResults;
		$this->displayHeader = utest_ui_common_HeaderDisplayMode::$AlwaysShowHeader;
	}}
	public function complete($result) {
		$this->result = $result;
		$this->handler($this);
	}
	public function getResults() {
		$buf = new StringBuf();
		$this->addHeader($buf, $this->result);
		{
			$_g = 0; $_g1 = $this->result->packageNames(null);
			while($_g < $_g1->length) {
				$pname = $_g1[$_g];
				++$_g;
				$pack = $this->result->getPackage($pname);
				if(utest_ui_common_ReportTools::skipResult($this, $pack->stats, $this->result->stats->isOk)) {
					continue;
				}
				{
					$_g2 = 0; $_g3 = $pack->classNames(null);
					while($_g2 < $_g3->length) {
						$cname = $_g3[$_g2];
						++$_g2;
						$cls = $pack->getClass($cname);
						if(utest_ui_common_ReportTools::skipResult($this, $cls->stats, $this->result->stats->isOk)) {
							continue;
						}
						$buf->add((utest_ui_text_PlainTextReport_0($this, $_g, $_g1, $_g2, $_g3, $buf, $cls, $cname, $pack, $pname)) . $cname . $this->newline);
						{
							$_g4 = 0; $_g5 = $cls->methodNames(null);
							while($_g4 < $_g5->length) {
								$mname = $_g5[$_g4];
								++$_g4;
								$fix = $cls->get($mname);
								if(utest_ui_common_ReportTools::skipResult($this, $fix->stats, $this->result->stats->isOk)) {
									continue;
								}
								$buf->add($this->indents(1) . $mname . ": ");
								if($fix->stats->isOk) {
									$buf->add("OK ");
								} else {
									if($fix->stats->hasErrors) {
										$buf->add("ERROR ");
									} else {
										if($fix->stats->hasFailures) {
											$buf->add("FAILURE ");
										} else {
											if($fix->stats->hasWarnings) {
												$buf->add("WARNING ");
											}
										}
									}
								}
								$messages = "";
								if(null == $fix) throw new HException('null iterable');
								$»it = $fix->iterator();
								while($»it->hasNext()) {
									$assertation = $»it->next();
									$»t = ($assertation);
									switch($»t->index) {
									case 0:
									$pos = $»t->params[0];
									{
										$buf->add(".");
									}break;
									case 1:
									$pos = $»t->params[1]; $msg = $»t->params[0];
									{
										$buf->add("F");
										$messages .= $this->indents(2) . "line: " . _hx_string_rec($pos->lineNumber, "") . ", " . $msg . $this->newline;
									}break;
									case 2:
									$s = $»t->params[1]; $e = $»t->params[0];
									{
										$buf->add("E");
										$messages .= $this->indents(2) . Std::string($e) . $this->dumpStack($s) . $this->newline;
									}break;
									case 3:
									$s = $»t->params[1]; $e = $»t->params[0];
									{
										$buf->add("S");
										$messages .= $this->indents(2) . Std::string($e) . $this->dumpStack($s) . $this->newline;
									}break;
									case 4:
									$s = $»t->params[1]; $e = $»t->params[0];
									{
										$buf->add("T");
										$messages .= $this->indents(2) . Std::string($e) . $this->dumpStack($s) . $this->newline;
									}break;
									case 5:
									$s = $»t->params[1]; $missedAsyncs = $»t->params[0];
									{
										$buf->add("O");
										$messages .= $this->indents(2) . "missed async calls: " . _hx_string_rec($missedAsyncs, "") . $this->dumpStack($s) . $this->newline;
									}break;
									case 6:
									$s = $»t->params[1]; $e = $»t->params[0];
									{
										$buf->add("A");
										$messages .= $this->indents(2) . Std::string($e) . $this->dumpStack($s) . $this->newline;
									}break;
									case 7:
									$msg = $»t->params[0];
									{
										$buf->add("W");
										$messages .= $this->indents(2) . $msg . $this->newline;
									}break;
									}
								}
								$buf->add($this->newline);
								$buf->add($messages);
								unset($mname,$messages,$fix);
							}
							unset($_g5,$_g4);
						}
						unset($cname,$cls);
					}
					unset($_g3,$_g2);
				}
				unset($pname,$pack);
			}
		}
		return $buf->b;
	}
	public $result;
	public function addHeader($buf, $result) {
		if(!utest_ui_common_ReportTools::hasHeader($this, $result->stats)) {
			return;
		}
		$end = haxe_Timer::stamp();
		$scripttime = intval(Sys::cpuTime() * 1000) / 1000;
		$time = intval(($end - $this->startTime) * 1000) / 1000;
		$buf->add("results: " . ((($result->stats->isOk) ? "ALL TESTS OK" : "SOME TESTS FAILURES")) . $this->newline . " " . $this->newline);
		$buf->add("assertations: " . _hx_string_rec($result->stats->assertations, "") . $this->newline);
		$buf->add("successes: " . _hx_string_rec($result->stats->successes, "") . $this->newline);
		$buf->add("errors: " . _hx_string_rec($result->stats->errors, "") . $this->newline);
		$buf->add("failures: " . _hx_string_rec($result->stats->failures, "") . $this->newline);
		$buf->add("warnings: " . _hx_string_rec($result->stats->warnings, "") . $this->newline);
		$buf->add("execution time: " . _hx_string_rec($time, "") . $this->newline);
		$buf->add("script time: " . _hx_string_rec($scripttime, "") . $this->newline);
		$buf->add($this->newline);
	}
	public function dumpStack($stack) {
		if($stack->length === 0) {
			return "";
		}
		$parts = _hx_explode("\x0A", haxe_Stack::toString($stack));
		$r = new _hx_array(array());
		{
			$_g = 0;
			while($_g < $parts->length) {
				$part = $parts[$_g];
				++$_g;
				if(_hx_index_of($part, " utest.", null) >= 0) {
					continue;
				}
				$r->push($part);
				unset($part);
			}
		}
		return $r->join($this->newline);
	}
	public function indents($c) {
		$s = "";
		{
			$_g = 0;
			while($_g < $c) {
				$_ = $_g++;
				$s .= $this->indent;
				unset($_);
			}
		}
		return $s;
	}
	public function start($e) {
		$this->startTime = haxe_Timer::stamp();
	}
	public $startTime;
	public function setHandler($handler) {
		$this->handler = $handler;
	}
	public $indent;
	public $newline;
	public $aggregator;
	public $handler;
	public $displayHeader;
	public $displaySuccessResults;
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
	function __toString() { return 'utest.ui.text.PlainTextReport'; }
}
function utest_ui_text_PlainTextReport_0(&$»this, &$_g, &$_g1, &$_g2, &$_g3, &$buf, &$cls, &$cname, &$pack, &$pname) {
	if($pname === "") {
		return "";
	} else {
		return $pname . ".";
	}
}
