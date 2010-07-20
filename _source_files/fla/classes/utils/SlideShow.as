package classes.utils 
{
	import flash.display.Bitmap;
	import flash.display.DisplayObject;
	import flash.display.Loader;
	import flash.display.MovieClip;
	import com.greensock.easing.*;
	import com.greensock.TweenLite;
	import flash.events.Event;
	import flash.events.TimerEvent;
	import flash.net.URLRequest;
	import flash.utils.Timer;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class SlideShow extends MovieClip
	{
		private var indice:int = 0;
		private var arrayImg:Array;
		private var container:MovieClip;
		private var loader:Loader;
		private var timer:Timer;
		
		public function SlideShow(_arrayImg:Array, _container:MovieClip, _duracao:Number = 6000) 
		{
			arrayImg = _arrayImg;
			container = _container;
			
			//loader
			loader = new Loader();
			loader.contentLoaderInfo.addEventListener(Event.COMPLETE, mostrarImagem);
			
			//timer
			timer = new Timer(_duracao, 1);
			timer.addEventListener(TimerEvent.TIMER_COMPLETE, carregarImagem);
			
			//init
			carregarImagem();
		}
		
		//img
		private function carregarImagem(event:TimerEvent = null):void
		{
			loader.load(new URLRequest(arrayImg[indice]));
		}
		
		private function mostrarImagem(event:Event):void
		{
			if (container.numChildren == 1) {
				TweenLite.to(container.getChildAt(0), .5, { alpha:0, onComplete:limparContainer } );
			}
			var bmp:Bitmap = event.target.content;
			bmp.alpha = 0;
			container.addChild(bmp);
			TweenLite.to(bmp, .5, { alpha:1 } );
			
			indice ++;
			if (indice == arrayImg.length) {
				indice = 0;
			}
			
			if(arrayImg.length > 1) timer.start();
		}
		
		private function limparContainer():void
		{
			if (container.numChildren == 2) {
				container.removeChildAt(0);
			}
		}
	}

}