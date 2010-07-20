package classes.utils 
{
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import classes.events.ChamarFacebox;
	import classes.utils.Global;
	import classes.utils.ImageLoader;
	import classes.utils.ImageUnloader;
	import com.greensock.TweenLite;
	import com.greensock.easing.*;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class Facebox extends MovieClip
	{	
		private var facebox:MovieClip;
		
		public function Facebox(_facebox:MovieClip) 
		{
			addEventListener(Event.ADDED_TO_STAGE, init);
		}
		
		//init
		private function init(event:Event):void
		{
			removeEventListener(Event.ADDED_TO_STAGE, init);
			
			//properties
			facebox.visible = false;
			
			//listeners
			Global.palco.addEventListener(ChamarFacebox.CARREGAR_IMG, carregarImgFacebox);
			facebox.addEventListener(MouseEvent.CLICK, fecharFacebox);
		}
		
		//facebox
		private function carregarImgFacebox(event:ChamarFacebox):void
		{
			if (facebox.container.numChildren == 1) var imgUnloader:ImageUnloader = new ImageUnloader(facebox.container.getChildAt(0), facebox.container);
			abrirFacebox(event.url);
		}
		
		private function abrirFacebox(_img:String):void
		{
			var imgLoader:ImageLoader(_img, facebox.container);
			facebox.visible = true;
			facebox.alpha = 0;
			TweenLite.to(facebox, .5, { alpha:1 } );
		}
		
		private function fecharFacebox(event:MouseEvent):void
		{
			TweenLite.to(facebox, .5, { alpha:0, onComplete:esconder } );
			
			function esconder():void
			{
				facebox.visible = false;
			}
		}
		
	}

}