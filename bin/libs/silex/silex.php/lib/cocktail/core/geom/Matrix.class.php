<?php

class cocktail_core_geom_Matrix {
	public function __construct($a = null, $b = null, $c = null, $d = null, $e = null, $f = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.geom.Matrix::new");
		$»spos = $GLOBALS['%s']->length;
		if($f === null) {
			$f = 0.0;
		}
		if($e === null) {
			$e = 0.0;
		}
		if($d === null) {
			$d = 1.0;
		}
		if($c === null) {
			$c = 0.0;
		}
		if($b === null) {
			$b = 0.0;
		}
		if($a === null) {
			$a = 1.0;
		}
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
		$this->d = $d;
		$this->e = $e;
		$this->f = $f;
		$GLOBALS['%s']->pop();
	}}
	public function skew($skewX, $skewY) {
		$GLOBALS['%s']->push("cocktail.core.geom.Matrix::skew");
		$»spos = $GLOBALS['%s']->length;
		$this->concatenate(cocktail_core_geom_Matrix::getConcatenationMatrix(1.0, Math::tan($skewY), Math::tan($skewY), 1.0, 0.0, 0.0));
		$GLOBALS['%s']->pop();
	}
	public function scale($scaleX, $scaleY) {
		$GLOBALS['%s']->push("cocktail.core.geom.Matrix::scale");
		$»spos = $GLOBALS['%s']->length;
		$this->concatenate(cocktail_core_geom_Matrix::getConcatenationMatrix($scaleX, 0.0, 0.0, $scaleY, 0.0, 0.0));
		$GLOBALS['%s']->pop();
	}
	public function rotate($angle) {
		$GLOBALS['%s']->push("cocktail.core.geom.Matrix::rotate");
		$»spos = $GLOBALS['%s']->length;
		$a = 0.0;
		$b = 0.0;
		$c = 0.0;
		$d = 0.0;
		if($angle === Math::$PI / 2) {
			$a = $d = 0.0;
			$c = $b = 1.0;
		} else {
			if($angle === Math::$PI) {
				$a = $d = -1.0;
				$c = $b = 0.0;
			} else {
				if($angle === Math::$PI * 3 / 2) {
					$a = $d = 0.0;
					$c = $b = -1.0;
				} else {
					$a = $d = Math::cos($angle);
					$c = $b = Math::sin($angle);
				}
			}
		}
		$this->concatenate(cocktail_core_geom_Matrix::getConcatenationMatrix($a, $b, $c * -1.0, $d, 0.0, 0.0));
		$GLOBALS['%s']->pop();
	}
	public function translate($x, $y) {
		$GLOBALS['%s']->push("cocktail.core.geom.Matrix::translate");
		$»spos = $GLOBALS['%s']->length;
		$this->concatenate(cocktail_core_geom_Matrix::getConcatenationMatrix(1.0, 0.0, 0.0, 1.0, $x, $y));
		$GLOBALS['%s']->pop();
	}
	public function concatenate($matrix) {
		$GLOBALS['%s']->push("cocktail.core.geom.Matrix::concatenate");
		$»spos = $GLOBALS['%s']->length;
		$this->a = $this->a * $matrix->a + $this->c * $matrix->b;
		$this->b = $this->b * $matrix->a + $this->d * $matrix->b;
		$this->c = $this->a * $matrix->c + $this->c * $matrix->d;
		$this->d = $this->b * $matrix->c + $this->d * $matrix->d;
		$this->e = $this->a * $matrix->e + $this->c * $matrix->f + $this->e;
		$this->f = $this->b * $matrix->e + $this->d * $matrix->f + $this->f;
		$GLOBALS['%s']->pop();
	}
	public function identity() {
		$GLOBALS['%s']->push("cocktail.core.geom.Matrix::identity");
		$»spos = $GLOBALS['%s']->length;
		$this->a = 1.0;
		$this->b = 0.0;
		$this->c = 0.0;
		$this->d = 1.0;
		$this->e = 0.0;
		$this->f = 0.0;
		$GLOBALS['%s']->pop();
	}
	public $f;
	public $d;
	public $e;
	public $c;
	public $b;
	public $a;
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
	static $_concatenationMatrix;
	static function getConcatenationMatrix($a, $b, $c, $d, $e, $f) {
		$GLOBALS['%s']->push("cocktail.core.geom.Matrix::getConcatenationMatrix");
		$»spos = $GLOBALS['%s']->length;
		if(cocktail_core_geom_Matrix::$_concatenationMatrix === null) {
			cocktail_core_geom_Matrix::$_concatenationMatrix = new cocktail_core_geom_Matrix(null, null, null, null, null, null);
		}
		cocktail_core_geom_Matrix::$_concatenationMatrix->a = $a;
		cocktail_core_geom_Matrix::$_concatenationMatrix->b = $b;
		cocktail_core_geom_Matrix::$_concatenationMatrix->c = $c;
		cocktail_core_geom_Matrix::$_concatenationMatrix->d = $d;
		cocktail_core_geom_Matrix::$_concatenationMatrix->e = $e;
		cocktail_core_geom_Matrix::$_concatenationMatrix->f = $f;
		{
			$»tmp = cocktail_core_geom_Matrix::$_concatenationMatrix;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.geom.Matrix'; }
}
