<?php

class cocktail_core_background_BackgroundManager {
	public function __construct() { 
	}
	static $_box;
	static $_destinationPoint;
	static function render($graphicContext, $backgroundBox, $style, $elementRenderer) {
		if(Math::round($backgroundBox->width) <= 0 || Math::round($backgroundBox->height) <= 0) {
			return;
		}
		if($style->usedValues->backgroundColor->alpha !== 0.0) {
			$graphicContext->fillRect($backgroundBox, $style->usedValues->backgroundColor);
		}
		$backgroundImages = cocktail_core_background_BackgroundManager::getAsArray($style->get_backgroundImage());
		$backgroundPositions = cocktail_core_background_BackgroundManager::getAsArray($style->get_backgroundPosition());
		$backgroundOrigins = cocktail_core_background_BackgroundManager::getAsArray($style->get_backgroundOrigin());
		$backgroundClips = cocktail_core_background_BackgroundManager::getAsArray($style->get_backgroundClip());
		$backgroundSizes = cocktail_core_background_BackgroundManager::getAsArray($style->get_backgroundSize());
		$backgroundRepeats = cocktail_core_background_BackgroundManager::getAsArray($style->get_backgroundRepeat());
		$length = $backgroundImages->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$backgroundImage = $backgroundImages[$i];
				$퍁 = ($backgroundImage);
				switch($퍁->index) {
				case 4:
				$value = $퍁->params[0];
				{
				}break;
				case 5:
				$value = $퍁->params[0];
				{
					cocktail_core_background_BackgroundManager::drawBackgroundImage($graphicContext, $value, $style, $backgroundBox, $backgroundPositions[$i], $backgroundSizes[$i], $backgroundOrigins[$i], $backgroundClips[$i], $backgroundRepeats[$i], $backgroundImages[$i], $elementRenderer);
				}break;
				default:{
				}break;
				}
				unset($i,$backgroundImage);
			}
		}
	}
	static function getAsArray($cssProperty) {
		$퍁 = ($cssProperty);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			return new _hx_array(array($cssProperty));
		}break;
		case 7:
		$value = $퍁->params[0];
		{
			return new _hx_array(array($cssProperty));
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return new _hx_array(array($cssProperty));
		}break;
		case 13:
		$value = $퍁->params[0];
		{
			return new _hx_array(array($cssProperty));
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			return new _hx_array(array($cssProperty));
		}break;
		default:{
			return null;
		}break;
		}
	}
	static function drawBackgroundImage($graphicContext, $url, $style, $backgroundBox, $backgroundPosition, $backgroundSize, $backgroundOrigin, $backgroundClip, $backgroundRepeat, $backgroundImage, $elementRenderer) {
		$foundResource = false;
		$resource = cocktail_core_resource_ResourceManager::getImageResource($url);
		if($resource->loaded === true) {
			$computedGradientStyles = cocktail_core_layout_computer_BackgroundStylesComputer::computeIndividualBackground($style, $backgroundBox, $resource->intrinsicWidth, $resource->intrinsicHeight, $resource->intrinsicRatio, $backgroundPosition, $backgroundSize, $backgroundOrigin, $backgroundClip, $backgroundRepeat, $backgroundImage);
			cocktail_core_background_BackgroundManager::doDrawBackgroundImage($backgroundBox, $graphicContext, $resource, $computedGradientStyles->backgroundOrigin, $computedGradientStyles->backgroundClip, $resource->intrinsicWidth, $resource->intrinsicHeight, $resource->intrinsicRatio, $computedGradientStyles->backgroundSize, $computedGradientStyles->backgroundPosition, $computedGradientStyles->backgroundRepeat);
			$foundResource = true;
		} else {
			if($resource->loadedWithError === false) {
				$resource->addEventListener("load", array(new _hx_lambda(array(&$backgroundBox, &$backgroundClip, &$backgroundImage, &$backgroundOrigin, &$backgroundPosition, &$backgroundRepeat, &$backgroundSize, &$elementRenderer, &$foundResource, &$graphicContext, &$resource, &$style, &$url), "cocktail_core_background_BackgroundManager_0"), 'execute'), null);
				$resource->addEventListener("error", array(new _hx_lambda(array(&$backgroundBox, &$backgroundClip, &$backgroundImage, &$backgroundOrigin, &$backgroundPosition, &$backgroundRepeat, &$backgroundSize, &$elementRenderer, &$foundResource, &$graphicContext, &$resource, &$style, &$url), "cocktail_core_background_BackgroundManager_1"), 'execute'), null);
				$foundResource = true;
			}
		}
		if($foundResource === false) {
		}
	}
	static function doDrawBackgroundImage($backgroundBox, $graphicContext, $resource, $backgroundPositioningBox, $backgroundPaintingBox, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio, $computedBackgroundSize, $computedBackgroundPosition, $backgroundRepeat) {
		$backgroundRepeatX = null;
		$backgroundRepeatY = null;
		$퍁 = ($backgroundRepeat);
		switch($퍁->index) {
		case 13:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value[0]);
			switch($퍁2->index) {
			case 4:
			$value1 = $퍁2->params[0];
			{
				$backgroundRepeatX = $value1;
			}break;
			default:{
			}break;
			}
			$퍁2 = ($value[1]);
			switch($퍁2->index) {
			case 4:
			$value1 = $퍁2->params[0];
			{
				$backgroundRepeatY = $value1;
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		$totalWidth = $computedBackgroundPosition->x + $backgroundPositioningBox->x;
		$maxWidth = $backgroundPaintingBox->x + $backgroundPaintingBox->width;
		$imageWidth = $computedBackgroundSize->width;
		$퍁 = ($backgroundRepeatX);
		switch($퍁->index) {
		case 72:
		{
			$maxWidth = $totalWidth + $imageWidth;
		}break;
		case 67:
		{
			while($totalWidth > $backgroundPaintingBox->x) {
				$totalWidth -= $imageWidth;
			}
		}break;
		case 70:
		{
			$imageWidth = Math::round($backgroundPositioningBox->width / $computedBackgroundSize->width);
			while($totalWidth > $backgroundPaintingBox->x) {
				$totalWidth -= $imageWidth;
			}
		}break;
		case 71:
		{
			while($totalWidth > $backgroundPaintingBox->x) {
				$totalWidth -= $imageWidth;
			}
		}break;
		default:{
		}break;
		}
		$initialWidth = $totalWidth;
		$totalHeight = $computedBackgroundPosition->y + Math::round($backgroundPositioningBox->y);
		$maxHeight = $backgroundPaintingBox->y + $backgroundPaintingBox->height;
		$imageHeight = $computedBackgroundSize->height;
		$퍁 = ($backgroundRepeatY);
		switch($퍁->index) {
		case 72:
		{
			$maxHeight = $totalHeight + $imageHeight;
		}break;
		case 67:
		{
			while($totalHeight > $backgroundPaintingBox->y) {
				$totalHeight -= $imageHeight;
			}
		}break;
		case 70:
		{
			$imageHeight = $backgroundPositioningBox->height / $computedBackgroundSize->height;
			while($totalHeight > $backgroundPaintingBox->y) {
				$totalHeight -= $imageHeight;
			}
		}break;
		case 71:
		{
			while($totalHeight > $backgroundPaintingBox->y) {
				$totalHeight -= $imageHeight;
			}
		}break;
		default:{
		}break;
		}
		$initialHeight = $totalHeight;
		if(_hx_equal($imageWidth / $intrinsicWidth, 1) && _hx_equal($imageHeight / $intrinsicHeight, 1)) {
			if(cocktail_core_background_BackgroundManager::$_destinationPoint === null) {
				cocktail_core_background_BackgroundManager::$_destinationPoint = new cocktail_core_geom_PointVO(0.0, 0.0);
			}
			cocktail_core_background_BackgroundManager::$_destinationPoint->x = $totalWidth + $backgroundBox->x - $computedBackgroundPosition->x;
			cocktail_core_background_BackgroundManager::$_destinationPoint->y = $totalHeight + $backgroundBox->y - $computedBackgroundPosition->y;
			$intWidth = $intrinsicWidth;
			$intHeight = $intrinsicHeight;
			if(cocktail_core_background_BackgroundManager::$_box === null) {
				cocktail_core_background_BackgroundManager::$_box = new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0);
			}
			cocktail_core_background_BackgroundManager::$_box->x = $backgroundPaintingBox->x - $computedBackgroundPosition->x;
			cocktail_core_background_BackgroundManager::$_box->y = $backgroundPaintingBox->y - $computedBackgroundPosition->y;
			cocktail_core_background_BackgroundManager::$_box->width = $backgroundPaintingBox->width;
			cocktail_core_background_BackgroundManager::$_box->height = $backgroundPaintingBox->height;
			while($totalHeight < $maxHeight) {
				$graphicContext->copyPixels($resource->nativeResource, cocktail_core_background_BackgroundManager::$_box, cocktail_core_background_BackgroundManager::$_destinationPoint);
				$totalWidth += $imageWidth;
				if($totalWidth >= $maxWidth) {
					$totalWidth = $initialWidth;
					$totalHeight += $imageHeight;
				}
				cocktail_core_background_BackgroundManager::$_destinationPoint->x = $totalWidth + $backgroundBox->x - $computedBackgroundPosition->x;
				cocktail_core_background_BackgroundManager::$_destinationPoint->y = $totalHeight + $backgroundBox->y - $computedBackgroundPosition->y;
			}
		} else {
			$matrix = new cocktail_core_geom_Matrix(null);
			$backgroundPaintingBox->x += $backgroundBox->x;
			$backgroundPaintingBox->y += $backgroundBox->y;
			while($totalHeight < $maxHeight) {
				$matrix->identity();
				$matrix->translate($totalWidth + $backgroundBox->x, $totalHeight + $backgroundBox->y);
				$matrix->scale($imageWidth / $intrinsicWidth, $imageHeight / $intrinsicHeight);
				$graphicContext->drawImage($resource->nativeResource, $matrix, $backgroundPaintingBox);
				$totalWidth += $imageWidth;
				if($totalWidth >= $maxWidth) {
					$totalWidth = $initialWidth;
					$totalHeight += $imageHeight;
				}
			}
		}
	}
	function __toString() { return 'cocktail.core.background.BackgroundManager'; }
}
function cocktail_core_background_BackgroundManager_0(&$backgroundBox, &$backgroundClip, &$backgroundImage, &$backgroundOrigin, &$backgroundPosition, &$backgroundRepeat, &$backgroundSize, &$elementRenderer, &$foundResource, &$graphicContext, &$resource, &$style, &$url, $e) {
	{
		$elementRenderer->invalidate(cocktail_core_renderer_InvalidationReason::$backgroundImageLoaded);
	}
}
function cocktail_core_background_BackgroundManager_1(&$backgroundBox, &$backgroundClip, &$backgroundImage, &$backgroundOrigin, &$backgroundPosition, &$backgroundRepeat, &$backgroundSize, &$elementRenderer, &$foundResource, &$graphicContext, &$resource, &$style, &$url, $e) {
	{
		$elementRenderer->invalidate(cocktail_core_renderer_InvalidationReason::$backgroundImageLoaded);
	}
}
