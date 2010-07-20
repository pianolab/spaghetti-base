package classes.utils 
{
	import flash.ui.ContextMenu;
	import flash.ui.ContextMenuItem;
	import flash.events.ContextMenuEvent;
	import flash.net.URLRequest;
	import flash.net.navigateToURL;
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class MenuContexto
	{
		private var stage:*;
		
		public function MenuContexto(_stage:*) 
		{
			stage = _stage;
			init()
		}
		
		//init
		private function init():void
		{
			//contextmenu
			var meuContextMenu:ContextMenu = new ContextMenu();
			meuContextMenu.hideBuiltInItems();
			var assina:ContextMenuItem = new ContextMenuItem("© pianoLab");
			var email:ContextMenuItem = new ContextMenuItem("agencia@pianolab.com.br");
			meuContextMenu.customItems.push(assina);
			meuContextMenu.customItems.push(email);
			assina.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, assinaLink);
			email.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, emailLink);

			function assinaLink (meuEventoTipo:ContextMenuEvent):void 
			{
				var minhaURL:URLRequest = new URLRequest("http://www.pianolab.com.br");
				navigateToURL(minhaURL, "_blank");
			}
			function emailLink (meuEventoTipo:ContextMenuEvent):void 
			{
				var minhaURL:URLRequest = new URLRequest("mailto:agencia@pianolab.com.br");
				navigateToURL(minhaURL, "_self");
			}

			stage.contextMenu = meuContextMenu;
		}
		
	}

}