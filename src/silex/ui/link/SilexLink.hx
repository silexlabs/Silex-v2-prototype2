package silex.ui.link;

import js.Lib;
import js.Dom;

import brix.component.navigation.Page;
import brix.component.navigation.link.LinkBase;
import brix.util.DomTools;

/**
 * Let you specify a page to display when the user clicks on the component's node
 * Todo: should behave well when run on server side
 */
class SilexLink extends LinkBase
{
	/**
	 * static method used to check the type of an URL
	 */
	public static function isUrl(value:String):Bool{
		if (value==null) return false;
		return StringTools.startsWith(value, "./") || StringTools.startsWith(value, "http://");
	}
	/**
	 * static method used to check the type of an URL
	 */
	public static function isPage(value:String, brixInstanceId:String):Bool{
		if (value==null) return false;
		var pageList = Page.getPageNodes(brixInstanceId);
		return pageList.length > 0;
	}
	/**
	 * user clicked the link
	 * do an action to the pages corresponding to our link
	 *
	 * open the pages with linkname in their css style class name
	 * this will close other pages
	 */
	override private function onClick(e:Event)
	{
		super.onClick(e);

		if (linkName==null){
			trace("Warning: link could not be opened because it has no href nor data-href attribute set");
			return;
		}

		if (isUrl(linkName)){
			Lib.window.open(linkName, targetAttr);
		}
		else if (isPage(linkName, brixInstanceId)){	
			// show the page with this name
			Page.openPage(linkName, targetAttr==LinkBase.CONFIG_TARGET_IS_POPUP, transitionDataShow, transitionDataHide, brixInstanceId, groupElement);
		}
	}
}
