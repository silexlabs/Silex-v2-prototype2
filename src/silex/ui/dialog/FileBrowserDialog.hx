package silex.ui.dialog;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.link.LinkToPage;
import brix.component.navigation.Page;
import brix.util.DomTools;

import silex.publication.PublicationData;
import silex.publication.PublicationModel;
import silex.publication.PublicationService;
import silex.ui.dialog.DialogBase;
import silex.ui.list.PublicationList;
import silex.ui.stage.PublicationViewer;

/**
 * This component displays a file browser and let's one choose a file or manage them
 * It opens in the publication's folder
 */
class FileBrowserDialog extends DialogBase
{
	/**
	 * The css class name of the div used to display the file browser
	 */
	public static inline var FB_CLASS_NAME = "file-browser-div";
	/**
	 * The page name of this dialog
	 */
	public static inline var FB_PAGE_NAME = "file-browser-dialog";
	/**
	 * static callback method
	 */
	public static var onValidate:String->Void;
	/**
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId, requestRedraw, null, null, cancelSelection);
	}
	/**
	 * Callback for the "show" event of the Layer class
	 * Update the publications list when the page is opened
	 */
	public function requestRedraw(transitionData:TransitionData) {
		// redraw the list, which will reload data and then refresh the list when onListData is dispatched by the model
		var fbDiv = DomTools.getSingleElement(rootElement, FB_CLASS_NAME, true);
		fbDiv.innerHTML = '<iframe name="kcfinder_iframe" src="../../third-party-tools/kcfinder/browse.php?type=publications&dir='+
		PublicationConstants.PUBLICATION_FOLDER+PublicationModel.getInstance().currentName+"/"+PublicationConstants.PUBLICATION_ASSETS_FOLDER+'/" ' +
        'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';

        Reflect.setField(Lib.window, "KCFinder", {
		    callBack: validateSelection
        });
	}
	/**
	 * Called after a click on the submit button
	 * Open the selected publication
	 */
	public function validateSelection(url:String) {
		if (url != null){
			if (onValidate != null){
				url = StringTools.replace(url, PublicationConstants.PUBLICATION_FOLDER+PublicationModel.getInstance().currentName, "");
				while (StringTools.startsWith(url,"/"))
					url = url.substring(1);

				onValidate(url);
			}
			close();
		}
	}
	/**
	 * Called after a click on the cancel button
	 */
	public function cancelSelection() {
		close();
	}
	/**
	 * Close this dialog
	 * It uses the dialog name as a css class
	 */
	override public function close() {
		// now do the default behavior
		super.close();
	}
}
