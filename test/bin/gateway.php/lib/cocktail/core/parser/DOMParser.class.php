<?php

class cocktail_core_parser_DOMParser {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.parser.DOMParser::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function parse($html, $ownerDocument) {
		$GLOBALS['%s']->push("cocktail.core.parser.DOMParser::parse");
		$»spos = $GLOBALS['%s']->length;
		$node = cocktail_core_parser_DOMParser::doSetInnerHTML(haxe_xml_Parser::parse($html)->firstElement(), $ownerDocument);
		{
			$GLOBALS['%s']->pop();
			return $node;
		}
		$GLOBALS['%s']->pop();
	}
	static function serialize($node) {
		$GLOBALS['%s']->push("cocktail.core.parser.DOMParser::serialize");
		$»spos = $GLOBALS['%s']->length;
		$xml = cocktail_core_parser_DOMParser::doGetInnerHTML($node, Xml::createElement($node->get_nodeName()));
		{
			$»tmp = $xml->toString();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function doSetInnerHTML($xml, $ownerDocument) {
		$GLOBALS['%s']->push("cocktail.core.parser.DOMParser::doSetInnerHTML");
		$»spos = $GLOBALS['%s']->length;
		switch($xml->nodeType) {
		case Xml::$PCData:{
			$»tmp = $ownerDocument->createTextNode($xml->getNodeValue());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case Xml::$Comment:{
			$»tmp = $ownerDocument->createComment($xml->getNodeValue());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case Xml::$Element:{
			$htmlElement = null;
			$name = strtolower($xml->getNodeName());
			$htmlElement = $ownerDocument->createElement($name);
			if(null == $xml) throw new HException('null iterable');
			$»it = $xml->iterator();
			while($»it->hasNext()) {
				$child = $»it->next();
				switch($child->nodeType) {
				case Xml::$PCData:{
					if($child->getNodeValue() === "") {
						continue 2;
					}
				}break;
				}
				$childNode = cocktail_core_parser_DOMParser::doSetInnerHTML($child, $ownerDocument);
				$htmlElement->appendChild($childNode);
				unset($childNode);
			}
			if(null == $xml) throw new HException('null iterable');
			$»it = $xml->attributes();
			while($»it->hasNext()) {
				$attribute = $»it->next();
				$value = $xml->get($attribute);
				$attribute = strtolower($attribute);
				$htmlElement->setAttribute($attribute, $value);
				unset($value);
			}
			{
				$GLOBALS['%s']->pop();
				return $htmlElement;
			}
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function doGetInnerHTML($node, $xml) {
		$GLOBALS['%s']->push("cocktail.core.parser.DOMParser::doGetInnerHTML");
		$»spos = $GLOBALS['%s']->length;
		$length = $node->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $node->childNodes[$i];
				switch($child->get_nodeType()) {
				case 1:{
					$childXml = Xml::createElement($child->get_nodeName());
					$childAttributes = $child->attributes;
					$childAttributesLength = $childAttributes->get_length();
					{
						$_g1 = 0;
						while($_g1 < $childAttributesLength) {
							$j = $_g1++;
							$attribute = $childAttributes->item($j);
							if($attribute->specified === true) {
								$childXml->set($attribute->name, $attribute->get_value());
							}
							unset($j,$attribute);
						}
					}
					$htmlChild = $child;
					$xml->addChild(cocktail_core_parser_DOMParser::doGetInnerHTML($child, $childXml));
					if($childXml->firstChild() === null && $child->isVoidElement() === false) {
						$childXml->addChild(Xml::createPCData(""));
					}
				}break;
				case 3:{
					$text = Xml::createPCData($child->get_nodeValue());
					$xml->addChild($text);
				}break;
				case 8:{
					$comment = Xml::createComment($child->get_nodeValue());
					$xml->addChild($comment);
				}break;
				}
				unset($i,$child);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $xml;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.parser.DOMParser'; }
}
