package classes.utils 
{
	import flash.display.DisplayObject;
	import flash.display.MovieClip;
	import com.greensock.easing.*;
	import com.greensock.TweenLite;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class ImageUnloader
	{
		private var child:DisplayObject;
		private var container:MovieClip;
		
		public function ImageUnloader(_child:DisplayObject, _container:MovieClip):void
		{
			child = _child;
			container = _container;
			
			//tween
			TweenLite.to(child, .5, { alpha:0,onComplete:removeChild } );
		}
		
		private function removeChild():void
		{
			container.removeChild(child);
			child = null;
		}
		
	}

}