<?php

class cocktail_core_background_BackgroundManager {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.background.BackgroundManager::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static $_box;
	static $_destinationPoint;
	static function render($graphicContext, $backgroundBox, $style, $elementRenderer) {
		$GLOBALS['%s']->push("cocktail.core.background.BackgroundManager::render");
		$»spos = $GLOBALS['%s']->length;
		if(Math::round($backgroundBox->width) <= 0 || Math::round($backgroundBox->height) <= 0) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($style->usedValues->backgroundColor->alpha !== 0.0) {
			$graphicContext->graphics->fillRect($backgroundBox, $style->usedValues->backgroundColor);
		}
		$backgroundImages = cocktail_core_background_BackgroundManager::getAsArray(_hx_deref((cocktail_core_background_BackgroundManager_0($backgroundBox, $elementRenderer, $graphicContext, $style)))->typedValue);
		$backgroundPositions = cocktail_core_background_BackgroundManager::getAsArray(_hx_deref((cocktail_core_background_BackgroundManager_1($backgroundBox, $backgroundImages, $elementRenderer, $graphicContext, $style)))->typedValue);
		$backgroundOrigins = cocktail_core_background_BackgroundManager::getAsArray(_hx_deref((cocktail_core_background_BackgroundManager_2($backgroundBox, $backgroundImages, $backgroundPositions, $elementRenderer, $graphicContext, $style)))->typedValue);
		$backgroundClips = cocktail_core_background_BackgroundManager::getAsArray(_hx_deref((cocktail_core_background_BackgroundManager_3($backgroundBox, $backgroundImages, $backgroundOrigins, $backgroundPositions, $elementRenderer, $graphicContext, $style)))->typedValue);
		$backgroundSizes = cocktail_core_background_BackgroundManager::getAsArray(_hx_deref((cocktail_core_background_BackgroundManager_4($backgroundBox, $backgroundClips, $backgroundImages, $backgroundOrigins, $backgroundPositions, $elementRenderer, $graphicContext, $style)))->typedValue);
		$backgroundRepeats = cocktail_core_background_BackgroundManager::getAsArray(_hx_deref((cocktail_core_background_BackgroundManager_5($backgroundBox, $backgroundClips, $backgroundImages, $backgroundOrigins, $backgroundPositions, $backgroundSizes, $elementRenderer, $graphicContext, $style)))->typedValue);
		$length = $backgroundImages->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$backgroundImage = $backgroundImages[$i];
				$»t = ($backgroundImage);
				switch($»t->index) {
				case 4:
				$value = $»t->params[0];
				{
				}break;
				case 5:
				$value = $»t->params[0];
				{
					cocktail_core_background_BackgroundManager::drawBackgroundImage($graphicContext, $value, $style, $backgroundBox, $backgroundPositions[$i], $backgroundSizes[$i], $backgroundOrigins[$i], $backgroundClips[$i], $backgroundRepeats[$i], $backgroundImages[$i], $elementRenderer);
				}break;
				default:{
				}break;
				}
				unset($i,$backgroundImage);
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function getAsArray($cssProperty) {
		$GLOBALS['%s']->push("cocktail.core.background.BackgroundManager::getAsArray");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($cssProperty);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»tmp = new _hx_array(array($cssProperty));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 7:
		$value = $»t->params[0];
		{
			$»tmp = new _hx_array(array($cssProperty));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$»tmp = new _hx_array(array($cssProperty));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 13:
		$value = $»t->params[0];
		{
			$»tmp = new _hx_array(array($cssProperty));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 5:
		$value = $»t->params[0];
		{
			$»tmp = new _hx_array(array($cssProperty));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return null;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function drawBackgroundImage($graphicContext, $url, $style, $backgroundBox, $backgroundPosition, $backgroundSize, $backgroundOrigin, $backgroundClip, $backgroundRepeat, $backgroundImage, $elementRenderer) {
		$GLOBALS['%s']->push("cocktail.core.background.BackgroundManager::drawBackgroundImage");
		$»spos = $GLOBALS['%s']->length;
		$foundResource = false;
		$resource = cocktail_core_resource_ResourceManager::getImageResource($url);
		if($resource->loaded === true) {
			$computedGradientStyles = cocktail_core_layout_computer_BackgroundStylesComputer::computeIndividualBackground($style, $backgroundBox, $resource->intrinsicWidth, $resource->intrinsicHeight, $resource->intrinsicRatio, $backgroundPosition, $backgroundSize, $backgroundOrigin, $backgroundClip, $backgroundRepeat, $backgroundImage);
			cocktail_core_background_BackgroundManager::doDrawBackgroundImage($backgroundBox, $graphicContext, $resource, $computedGradientStyles->backgroundOrigin, $computedGradientStyles->backgroundClip, $resource->intrinsicWidth, $resource->intrinsicHeight, $resource->intrinsicRatio, $computedGradientStyles->backgroundSize, $computedGradientStyles->backgroundPosition, $computedGradientStyles->backgroundRepeat);
			$foundResource = true;
		} else {
			if($resource->loadedWithError === false) {
				$resource->addEventListener("load", array(new _hx_lambda(array(&$backgroundBox, &$backgroundClip, &$backgroundImage, &$backgroundOrigin, &$backgroundPosition, &$backgroundRepeat, &$backgroundSize, &$elementRenderer, &$foundResource, &$graphicContext, &$resource, &$style, &$url), "cocktail_core_background_BackgroundManager_6"), 'execute'), null);
				$resource->addEventListener("error", array(new _hx_lambda(array(&$backgroundBox, &$backgroundClip, &$backgroundImage, &$backgroundOrigin, &$backgroundPosition, &$backgroundRepeat, &$backgroundSize, &$elementRenderer, &$foundResource, &$graphicContext, &$resource, &$style, &$url), "cocktail_core_background_BackgroundManager_7"), 'execute'), null);
				$foundResource = true;
			}
		}
		if($foundResource === false) {
		}
		$GLOBALS['%s']->pop();
	}
	static function doDrawBackgroundImage($backgroundBox, $graphicContext, $resource, $backgroundPositioningBox, $backgroundPaintingBox, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio, $computedBackgroundSize, $computedBackgroundPosition, $backgroundRepeat) {
		$GLOBALS['%s']->push("cocktail.core.background.BackgroundManager::doDrawBackgroundImage");
		$»spos = $GLOBALS['%s']->length;
		$backgroundRepeatX = null;
		$backgroundRepeatY = null;
		$»t = ($backgroundRepeat);
		switch($»t->index) {
		case 13:
		$value = $»t->params[0];
		{
			$»t2 = ($value[0]);
			switch($»t2->index) {
			case 4:
			$value1 = $»t2->params[0];
			{
				$backgroundRepeatX = $value1;
			}break;
			default:{
			}break;
			}
			$»t2 = ($value[1]);
			switch($»t2->index) {
			case 4:
			$value1 = $»t2->params[0];
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
		$»t = ($backgroundRepeatX);
		switch($»t->index) {
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
		$»t = ($backgroundRepeatY);
		switch($»t->index) {
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
				cocktail_core_background_BackgroundManager::$_box = new cocktail_core_geom_RectangleVO();
			}
			cocktail_core_background_BackgroundManager::$_box->x = $backgroundPaintingBox->x - $computedBackgroundPosition->x;
			cocktail_core_background_BackgroundManager::$_box->y = $backgroundPaintingBox->y - $computedBackgroundPosition->y;
			cocktail_core_background_BackgroundManager::$_box->width = $backgroundPaintingBox->width;
			cocktail_core_background_BackgroundManager::$_box->height = $backgroundPaintingBox->height;
			while($totalHeight < $maxHeight) {
				$graphicContext->graphics->copyPixels($resource->nativeResource, cocktail_core_background_BackgroundManager::$_box, cocktail_core_background_BackgroundManager::$_destinationPoint);
				$totalWidth += $imageWidth;
				if($totalWidth >= $maxWidth) {
					$totalWidth = $initialWidth;
					$totalHeight += $imageHeight;
				}
				cocktail_core_background_BackgroundManager::$_destinationPoint->x = $totalWidth + $backgroundBox->x - $computedBackgroundPosition->x;
				cocktail_core_background_BackgroundManager::$_destinationPoint->y = $totalHeight + $backgroundBox->y - $computedBackgroundPosition->y;
			}
		} else {
			$matrix = new cocktail_core_geom_Matrix(null, null, null, null, null, null);
			$backgroundPaintingBox->x += $backgroundBox->x;
			$backgroundPaintingBox->y += $backgroundBox->y;
			while($totalHeight < $maxHeight) {
				$matrix->identity();
				$matrix->translate($totalWidth + $backgroundBox->x, $totalHeight + $backgroundBox->y);
				$matrix->scale($imageWidth / $intrinsicWidth, $imageHeight / $intrinsicHeight);
				$graphicContext->graphics->drawImage($resource->nativeResource, $matrix, $backgroundPaintingBox);
				$totalWidth += $imageWidth;
				if($totalWidth >= $maxWidth) {
					$totalWidth = $initialWidth;
					$totalHeight += $imageHeight;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.background.BackgroundManager'; }
}
function cocktail_core_background_BackgroundManager_0(&$backgroundBox, &$elementRenderer, &$graphicContext, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "background-image") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_background_BackgroundManager_1(&$backgroundBox, &$backgroundImages, &$elementRenderer, &$graphicContext, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "background-position") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_background_BackgroundManager_2(&$backgroundBox, &$backgroundImages, &$backgroundPositions, &$elementRenderer, &$graphicContext, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "background-origin") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_background_BackgroundManager_3(&$backgroundBox, &$backgroundImages, &$backgroundOrigins, &$backgroundPositions, &$elementRenderer, &$graphicContext, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "background-clip") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_background_BackgroundManager_4(&$backgroundBox, &$backgroundClips, &$backgroundImages, &$backgroundOrigins, &$backgroundPositions, &$elementRenderer, &$graphicContext, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "background-size") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_background_BackgroundManager_5(&$backgroundBox, &$backgroundClips, &$backgroundImages, &$backgroundOrigins, &$backgroundPositions, &$backgroundSizes, &$elementRenderer, &$graphicContext, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "background-repeat") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_background_BackgroundManager_6(&$backgroundBox, &$backgroundClip, &$backgroundImage, &$backgroundOrigin, &$backgroundPosition, &$backgroundRepeat, &$backgroundSize, &$elementRenderer, &$foundResource, &$graphicContext, &$resource, &$style, &$url, $e) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("cocktail.core.background.BackgroundManager::drawBackgroundImage@205");
		$»spos2 = $GLOBALS['%s']->length;
		$elementRenderer->invalidateRendering();
		$GLOBALS['%s']->pop();
	}
}
function cocktail_core_background_BackgroundManager_7(&$backgroundBox, &$backgroundClip, &$backgroundImage, &$backgroundOrigin, &$backgroundPosition, &$backgroundRepeat, &$backgroundSize, &$elementRenderer, &$foundResource, &$graphicContext, &$resource, &$style, &$url, $e) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("cocktail.core.background.BackgroundManager::drawBackgroundImage@209");
		$»spos2 = $GLOBALS['%s']->length;
		$elementRenderer->invalidateRendering();
		$GLOBALS['%s']->pop();
	}
}
