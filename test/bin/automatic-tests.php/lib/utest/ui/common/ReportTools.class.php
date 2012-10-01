<?php

class utest_ui_common_ReportTools {
	public function __construct(){}
	static function hasHeader($report, $stats) {
		$�t = ($report->displayHeader);
		switch($�t->index) {
		case 1:
		{
			return false;
		}break;
		case 2:
		{
			if(!$stats->isOk) {
				return true;
			}
			$�t2 = ($report->displaySuccessResults);
			switch($�t2->index) {
			case 1:
			{
				return false;
			}break;
			case 0:
			case 2:
			{
				return true;
			}break;
			}
		}break;
		case 0:
		{
			return true;
		}break;
		}
	}
	static function skipResult($report, $stats, $isOk) {
		if(!$stats->isOk) {
			return false;
		}
		return utest_ui_common_ReportTools_0($isOk, $report, $stats);
	}
	static function hasOutput($report, $stats) {
		if(!$stats->isOk) {
			return true;
		}
		return utest_ui_common_ReportTools::hasHeader($report, $stats);
	}
	function __toString() { return 'utest.ui.common.ReportTools'; }
}
function utest_ui_common_ReportTools_0(&$isOk, &$report, &$stats) {
	$�t = ($report->displaySuccessResults);
	switch($�t->index) {
	case 1:
	{
		return true;
	}break;
	case 0:
	{
		return false;
	}break;
	case 2:
	{
		return !$isOk;
	}break;
	}
}
