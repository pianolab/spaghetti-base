package classes.utils 
{
	import classes.utils.Global;
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.IOErrorEvent;
	import flash.events.ProgressEvent;
	import com.asual.swfaddress.SWFAddress;
	import com.asual.swfaddress.SWFAddressEvent;
	import com.greensock.easing.*;
	import com.greensock.TweenLite;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class Navigation
	{
		private var i:int;
		private var sectionLoader:Loader;
		private var xmlAddress:XML;
		private var xmlUrl:String;
		private var container:MovieClip;
		private var errorUrl:String;
		
		public function Navigation(_container:MovieClip, _xmlUrl:String = "xml/address.xml", _errorUrl:String = "home" ) 
		{
			container = _container;
			xmlUrl = _xmlUrl;
			errorUrl = _errorUrl;
			init();
		}
		
		//init
		private function init():void
		{
			//xmladdress
			loadXmlAddress();
			
			//sectionLoader
			sectionLoader = new Loader();
			sectionLoader.contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS, progressHandler);
			sectionLoader.contentLoaderInfo.addEventListener(Event.INIT, showContent);
			sectionLoader.contentLoaderInfo.addEventListener(IOErrorEvent.IO_ERROR, errorHandler);
			container.addChild(sectionLoader);
		}
		
		//xmladdress
		private function loadXmlAddress():void
		{
			var xmlAddressLoader:URLLoader = new URLLoader(new URLRequest(xmlUrl));
			xmlAddressLoader.addEventListener(Event.COMPLETE, setXmlAddress);
		}
		
		private function setXmlAddress(event:Event):void
		{
			xmlAddress = XML(event.target.data);
			Global.xml = xmlAddress;
			SWFAddress.addEventListener(SWFAddressEvent.CHANGE, addressChangeHandler);
		}
		
		//swfaddress
		private function addressChangeHandler(event:SWFAddressEvent = null):void
		{
			verificarSecao(SWFAddress.getValue());
		}
		
		private function verificarSecao(_url:String):void
		{
			if (_url != "/") {
				var arrayNew:Array = _url.split("/");
				if (arrayNew[arrayNew.length - 1] == "") {
					arrayNew.splice(arrayNew.length - 1, 1);
				}
				for (i = 1; i < arrayNew.length; i++) {
					var element:* = xmlAddress.section.(@id == arrayNew[i]);
					var parentExists:* = xmlAddress.section.(@id == arrayNew[(i - 1)]).hasOwnProperty("url");
					if (element.hasOwnProperty("url")) {
						if (parentExists) {
							var parent:* = xmlAddress.section.(@id == arrayNew[(i - 1)]);
							if (element.@child == parent.@id) {
								if (element.@last == "true") {
									verificarSecaoAtual(element, xmlAddress);
									break;
								}else {
									if (i == arrayNew.length - 1) {
										verificarSecaoAtual(element, xmlAddress);
										break;
									}else {
										continue;
									}
								}
							}else {
								trace(_url);
								SWFAddress.setValue(errorUrl);
								break;
							}
						}else {
							if (element.@last == "true") {
								verificarSecaoAtual(element, xmlAddress);
								break;
							}else {
								if (i == arrayNew.length - 1) {
									verificarSecaoAtual(element, xmlAddress);
									break;
								}else {
									continue;
								}
							}
						}
					}else {
						SWFAddress.setValue(errorUrl);
						break;
					}
				}
			}else {
				SWFAddress.setValue("home");
			}
			
			function verificarSecaoAtual(_elemento:*, _xml:*):void
			{
				if (_elemento.@id != Global.secaoAtual) {
					Global.secaoAtual = _elemento.@id;
					killContent(_xml.section.(@id == element.@id).url);
				}
			}
		}
		
		//content
		private function loadContent(_url:String):void
		{
			sectionLoader.load(new URLRequest(_url));
		}
		
		private function killContent(_url:String):void
		{
			TweenLite.to(container, 1, { alpha:0, onComplete:loadContent, onCompleteParams:[_url] } );
		}
		
		private function progressHandler(event:ProgressEvent):void
		{
			//trace(event.target.bytesLoaded / event.target.bytesTotal);
		}
		
		private function showContent(event:Event):void
		{
			TweenLite.to(container, 1, { alpha:1 } );
		}
		
		private function errorHandler(error:IOErrorEvent):void
		{
			trace(error);
		}
		
	}

}