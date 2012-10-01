<?php

class cocktail_core_background_BackgroundDrawingManager extends cocktail_port_server_DrawingManager {
	public function __construct($backgroundBox) { if(!php_Boot::$skip_constructor) {
		parent::__construct(Math::round($backgroundBox->width),Math::round($backgroundBox->height));
	}}
	public function getRotation($value) {
		$rotation = null;
		$퍁 = ($value);
		switch($퍁->index) {
		case 0:
		$value1 = $퍁->params[0];
		{
			$rotation = Math::round(cocktail_core_unit_UnitManager::getDegreeFromAngle($value1));
		}break;
		case 1:
		$value1 = $퍁->params[0];
		{
			$퍁2 = ($value1);
			switch($퍁2->index) {
			case 0:
			{
				$rotation = 0;
			}break;
			case 3:
			{
				$rotation = 90;
			}break;
			case 2:
			{
				$rotation = 180;
			}break;
			case 1:
			{
				$rotation = 270;
			}break;
			}
		}break;
		case 2:
		$value1 = $퍁->params[0];
		{
			$퍁2 = ($value1);
			switch($퍁2->index) {
			case 0:
			{
				$rotation = 45;
			}break;
			case 1:
			{
				$rotation = 135;
			}break;
			case 2:
			{
				$rotation = 225;
			}break;
			case 3:
			{
				$rotation = 315;
			}break;
			}
		}break;
		}
		return $rotation;
	}
	public function getGradientStops($value) {
		$gradientStopsData = new _hx_array(array());
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$ratio = null;
				$퍁 = (_hx_array_get($value, $i)->stop);
				switch($퍁->index) {
				case 0:
				$value1 = $퍁->params[0];
				{
					$ratio = 0;
				}break;
				case 1:
				$value1 = $퍁->params[0];
				{
					$ratio = $value1;
				}break;
				}
				$color = cocktail_core_unit_UnitManager::getColorDataFromCSSColor(_hx_array_get($value, $i)->color);
				$gradientStopsData->push(_hx_anonymous(array("colorStop" => $color, "ratio" => $ratio)));
				unset($ratio,$i,$color);
			}
		}
		return $gradientStopsData;
	}
	public function drawBackgroundGradient($gradient, $backgroundPositioningBox, $backgroundPaintingBox, $computedBackgroundSize, $computedBackgroundPosition, $backgroundRepeat) {
		$gradientSurface = new cocktail_port_server_DrawingManager(Math::round($computedBackgroundSize->width), Math::round($computedBackgroundSize->height));
		$fillStyle = null;
		$lineStyle = cocktail_core_drawing_LineStyleValue::$none;
		$퍁 = ($gradient);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$gradientStyle = _hx_anonymous(array("gradientType" => cocktail_core_drawing_GradientTypeValue::$linear, "gradientStops" => $this->getGradientStops($value->colorStops), "rotation" => $this->getRotation($value->angle)));
			$fillStyle = cocktail_core_drawing_FillStyleValue::gradient($gradientStyle);
		}break;
		}
		$gradientSurface->beginFill($fillStyle, $lineStyle);
		$gradientSurface->drawRect(0, 0, Math::round($computedBackgroundSize->width), Math::round($computedBackgroundSize->height), null);
		$gradientSurface->endFill();
		$this->drawBackgroundImage($gradientSurface->nativeElement, null, $backgroundPositioningBox, $backgroundPaintingBox, Math::round($computedBackgroundSize->width), Math::round($computedBackgroundSize->height), $computedBackgroundSize->width / $computedBackgroundSize->height, $computedBackgroundSize, $computedBackgroundPosition, $backgroundRepeat);
	}
	public function drawBackgroundColor($color, $backgroundPaintingBox) {
		$this->fillRect($backgroundPaintingBox, $color);
	}
	public function drawBackgroundImage($nativeImage, $resource, $backgroundPositioningBox, $backgroundPaintingBox, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio, $computedBackgroundSize, $computedBackgroundPosition, $backgroundRepeat) {
		$totalWidth = $computedBackgroundPosition->x + $backgroundPositioningBox->x;
		$maxWidth = $backgroundPaintingBox->x + $backgroundPaintingBox->width;
		$imageWidth = $computedBackgroundSize->width;
		$퍁 = ($backgroundRepeat->x);
		switch($퍁->index) {
		case 3:
		{
			$maxWidth = $totalWidth + $imageWidth;
		}break;
		case 0:
		{
			while($totalWidth > $backgroundPaintingBox->x) {
				$totalWidth -= $imageWidth;
			}
		}break;
		case 1:
		{
			$imageWidth = Math::round($backgroundPositioningBox->width / $computedBackgroundSize->width);
			while($totalWidth > $backgroundPaintingBox->x) {
				$totalWidth -= $imageWidth;
			}
		}break;
		case 2:
		{
			while($totalWidth > $backgroundPaintingBox->x) {
				$totalWidth -= $imageWidth;
			}
		}break;
		}
		$initialWidth = $totalWidth;
		$totalHeight = $computedBackgroundPosition->y + Math::round($backgroundPositioningBox->y);
		$maxHeight = $backgroundPaintingBox->y + $backgroundPaintingBox->height;
		$imageHeight = $computedBackgroundSize->height;
		$퍁 = ($backgroundRepeat->y);
		switch($퍁->index) {
		case 3:
		{
			$maxHeight = $totalHeight + $imageHeight;
		}break;
		case 0:
		{
			while($totalHeight > $backgroundPaintingBox->y) {
				$totalHeight -= $imageHeight;
			}
		}break;
		case 1:
		{
			$imageHeight = $backgroundPositioningBox->height / $computedBackgroundSize->height;
			while($totalHeight > $backgroundPaintingBox->y) {
				$totalHeight -= $imageHeight;
			}
		}break;
		case 2:
		{
			while($totalHeight > $backgroundPaintingBox->y) {
				$totalHeight -= $imageHeight;
			}
		}break;
		}
		$initialHeight = $totalHeight;
		if(_hx_equal($imageWidth / $intrinsicWidth, 1) && _hx_equal($imageHeight / $intrinsicHeight, 1)) {
			$destinationPoint = _hx_anonymous(array("x" => $totalWidth, "y" => $totalHeight));
			$intWidth = $intrinsicWidth;
			$intHeight = $intrinsicHeight;
			$box = _hx_anonymous(array("x" => 0.0, "y" => 0.0, "width" => $intWidth, "height" => $intHeight));
			while($totalHeight < $maxHeight) {
				$this->copyPixels($resource->nativeResource, $box, $destinationPoint);
				$totalWidth += $imageWidth;
				if($totalWidth >= $maxWidth) {
					$totalWidth = $initialWidth;
					$totalHeight += $imageHeight;
				}
				$destinationPoint->x = $totalWidth;
				$destinationPoint->y = $totalHeight;
			}
		} else {
			$matrix = new cocktail_core_geom_Matrix(null);
			while($totalHeight < $maxHeight) {
				$matrix->identity();
				$matrix->translate($totalWidth, $totalHeight);
				$matrix->scale($imageWidth / $intrinsicWidth, $imageHeight / $intrinsicHeight);
				$this->drawImage($nativeImage, $matrix, $backgroundPaintingBox);
				$totalWidth += $imageWidth;
				if($totalWidth >= $maxWidth) {
					$totalWidth = $initialWidth;
					$totalHeight += $imageHeight;
				}
			}
		}
	}
	function __toString() { return 'cocktail.core.background.BackgroundDrawingManager'; }
}
