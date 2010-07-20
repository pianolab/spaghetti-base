package classes.utils 
{
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.IOErrorEvent;
	import flash.events.ProgressEvent;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.net.URLRequestMethod;
	import com.greensock.easing.*;
	import com.greensock.TweenLite;
	import flash.net.URLVariables;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class ImageLoader extends MovieClip
	{
		private var url:String;
		private var container:MovieClip;
		private var loader:Loader;
		private var progressbar:MovieClip;
		private var _mask:MovieClip;
		private var transitionType:String;
		
		public function ImageLoader(_url:String, _container:MovieClip, _progressbar:MovieClip = null,__mask:MovieClip = null, _trasitionType:String = "alpha", _variables:URLVariables = null, _method:URLRequestMethod = URLRequestMethod.POST):void
		{
			url = _url;
			container = _container;
			progressbar = _progressbar;
			_mask = __mask;
			transitionType = _trasitionType;
			
			//loader
			var request:URLRequest = new URLRequest(url);
			if (_variables) {
				request.data = _variables;
				request.method = _method;
			}
			loader = new Loader();
			loader.contentLoaderInfo.addEventListener(Event.COMPLETE, showImage);
			loader.contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS, progressHandler);
			loader.contentLoaderInfo.addEventListener(IOErrorEvent.IO_ERROR, errorHandler);
			loader.load(request);
			container.addChild(loader);
			
			//progressbar
			if (progressbar) {
				progressbar.visible = true;
			}
		}
		
		//handlers
		private function showImage(event:Event):void
		{
			if (progressbar) {
				progressbar.visible = false;
			}
			
			switch(transitionType) {
				case "alpha":
					loader.alpha = 0;
					TweenLite.to(loader, .6, { alpha:1 } );
					break;
			}
		}
		
		private function progressHandler(event:ProgressEvent):void
		{
			if (progressbar) {
				progressbar.scaleX = event.bytesLoaded / event.bytesTotal;
			}
		}
		
		private function errorHandler(error:IOErrorEvent):void
		{
			
		}
	}

}