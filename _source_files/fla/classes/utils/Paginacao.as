package classes.utils 
{
	import flash.display.MovieClip;
	import com.greensock.TweenMax;
	import com.greensock.easing.*;
	import flash.events.MouseEvent;
	import flash.text.TextFieldAutoSize;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class Paginacao extends MovieClip
	{
		public static var ativo:Paginacao;
		public var indice:int;
		
		public function Paginacao(_label:String,_indice:int):void 
		{
			indice = _indice;
			txt.autoSize = TextFieldAutoSize.LEFT;
			txt.text = _label;
			buttonMode = true;
			mouseChildren = false;
			
			//mouse listeners
			addEventListener(MouseEvent.CLICK, clickHandler);
			addEventListener(MouseEvent.ROLL_OVER, overHandler);
			addEventListener(MouseEvent.ROLL_OUT, outHandler);
		}
		
		//handlers
		private function overHandler(event:MouseEvent):void
		{
			if (this != ativo) {
				TweenMax.to(txt, .3, { colorTransform:{tint:0xffffff, tintAmount:1}} );
			}
		}
		
		private function outHandler(event:MouseEvent):void
		{
			if (this != ativo) {
				TweenMax.to(txt, .2, { colorTransform:{tint:0xffffff, tintAmount:0}} );
			}
		}
		
		private function clickHandler(event:MouseEvent):void
		{
			if (this != ativo) {
				deixarAtivo(this);
			}
		}
		
		public static function deixarAtivo(_pag:Paginacao):void
		{
			if (ativo) {
				ativo.mouseEnabled = true;
				TweenMax.to(ativo.txt, .2, { colorTransform:{tint:0xffffff, tintAmount:0}} );
			}
			ativo = _pag;
			_pag.mouseEnabled = false;
			TweenMax.to(_pag.txt, .3, { colorTransform:{tint:0xffffff, tintAmount:1}} );
		}
	}

}