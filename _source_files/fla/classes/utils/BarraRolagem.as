package classes.utils
{
	import flash.display.DisplayObject;
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.display.Stage;
	import flash.events.Event;
	import flash.events.IOErrorEvent;
	import flash.events.MouseEvent;
	import flash.events.TimerEvent;
	import flash.geom.Rectangle;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.text.TextField;
	import flash.text.TextFieldAutoSize;
	import flash.utils.Timer;
	import com.greensock.easing.*;
	import com.greensock.TweenLite;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class BarraRolagem extends MovieClip
	{
		private var rect:Rectangle;
		private var posicaoDrag:Number;
		private var proporcao:Number;
		private var posicaoContainer:Number;// = 0;
		private var posicaoInicial:Number;
		private var flag:Boolean = true;
		private var flagThumb:Boolean = false;
		private var i:int;
		private var barraRolagem:MovieClip;
		private var container:DisplayObject;
		private var mascara:DisplayObject;
		private var palco:Stage;
		private var posThumbTemp:Number;
		
		public function BarraRolagem(_barra:MovieClip, _container:DisplayObject, _mascara:DisplayObject, _palco:Stage) :void
		{
			visible = false;
			
			barraRolagem = _barra;
			container = _container;
			mascara = _mascara;
			palco = _palco;
			posicaoInicial = container.y;
			
			barraRolagem.drag.addEventListener(MouseEvent.ROLL_OVER, overHandler);
			barraRolagem.drag.addEventListener(MouseEvent.ROLL_OUT, outHandler);
			palco.addEventListener(MouseEvent.MOUSE_WHEEL, wheelHandler);
			
			posicaoDrag = barraRolagem.drag.y;
			rect = new Rectangle(barraRolagem.drag.x, barraRolagem.drag.y, 0, barraRolagem.height - 30 );
			iniciarBarraRolagem();
			
			addEventListener(Event.ENTER_FRAME, moverContainer);
		}
		
		//THUMB
		private function overHandler(event:MouseEvent):void
		{
			posThumbTemp = barraRolagem.drag.y;
			//TweenLite.to(barraRolagem.drag, .3, { width:40 } );
		}
		
		private function outHandler(event:MouseEvent):void
		{
			//TweenLite.to(barraRolagem.drag, .3, { width:12 } );
		}
		
		private function wheelHandler(event:MouseEvent):void
		{
			if (barraRolagem.drag.y >= (rect.y) && barraRolagem.drag.y <= (rect.y + rect.height))
			{
				var posicaoDrag:Number = barraRolagem.drag.y;
				posicaoDrag += (event.delta * 20);
				if (posicaoDrag < (rect.y + (barraRolagem.drag.height / 2))) posicaoDrag = (rect.y);
				if (posicaoDrag > (rect.y + rect.height - (barraRolagem.drag.height / 2))) posicaoDrag = (rect.y + rect.height);
				TweenLite.to(barraRolagem.drag, 1, { y:posicaoDrag, onComplete:outHandler, onCompleteParams:[null] } );
			}
		}
		//BARRA DE ROLAGEM
		public function iniciarBarraRolagem():void
		{
			posicaoContainer = posicaoInicial;
			barraRolagem.drag.y = 0;
			posicaoDrag = barraRolagem.drag.y;
			proporcao = (container.height - mascara.height) / (barraRolagem.height - 30);
			
			if (container.height > mascara.height)
			{
				barraRolagem.visible = true;
				barraRolagem.drag.addEventListener(MouseEvent.MOUSE_DOWN, inciarDrag);
			}else {
				barraRolagem.visible = false;
				barraRolagem.drag.removeEventListener(MouseEvent.MOUSE_DOWN, inciarDrag);
			}
		}
		
		private function inciarDrag(event:MouseEvent):void
		{
			palco.addEventListener(MouseEvent.MOUSE_UP, pararDrag);
			barraRolagem.drag.startDrag(true, rect);
		}
		
		private function pararDrag(event:MouseEvent):void
		{
			palco.removeEventListener(MouseEvent.MOUSE_UP, pararDrag);
			barraRolagem.drag.stopDrag();
			var tmp:Number = barraRolagem.drag.y - posThumbTemp;
			var posY:Number;
			if (tmp > 0)
			{
				posY = barraRolagem.drag.y + 25;
				if(posY > (rect.y + rect.height - (barraRolagem.drag.height / 2))) posY = (rect.y + rect.height);
				TweenLite.to(barraRolagem.drag, .3, { y:posY, onComplete:outHandler, onCompleteParams:[null] } );
			}else if (tmp < 0)
			{
				posY = barraRolagem.drag.y - 25;
				if (posY < (rect.y + (barraRolagem.drag.height / 2))) posY = (rect.y);
				TweenLite.to(barraRolagem.drag, .3, { y:posY, onComplete:outHandler, onCompleteParams:[null]  } );
			}
		}
		
		private function moverContainer(event:Event):void
		{
			if (flag)
			{
				var diferenca:Number = posicaoDrag - barraRolagem.drag.y;
				posicaoContainer += diferenca * proporcao;
				TweenLite.to(container, .7, { y:posicaoContainer } );
				posicaoDrag = barraRolagem.drag.y;
			}
		}
	}
	
}