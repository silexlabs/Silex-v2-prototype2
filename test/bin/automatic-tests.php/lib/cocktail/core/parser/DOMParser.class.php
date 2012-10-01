<?php

class cocktail_core_parser_DOMParser {
	public function __construct() { 
	}
	static function parse($html, $ownerDocument) {
		$node = cocktail_core_parser_DOMParser::doSetInnerHTML(haxe_xml_Parser::parse($html)->firstElement(), $ownerDocument);
		return $node;
	}
	static function serialize($node) {
		$xml = cocktail_core_parser_DOMParser::doGetInnerHTML($node, Xml::createElement($node->get_nodeName()));
		return $xml->toString();
	}
	static function doSetInnerHTML($xml, $ownerDocument) {
		switch($xml->nodeType) {
		case Xml::$PCData:{
			return $ownerDocument->createTextNode($xml->getNodeValue());
		}break;
		case Xml::$Comment:{
			return $ownerDocument->createComment($xml->getNodeValue());
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
			return $htmlElement;
		}break;
		}
		return null;
	}
	static function doGetInnerHTML($node, $xml) {
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
		return $xml;
	}
	function __toString() { return 'cocktail.core.parser.DOMParser'; }
}
