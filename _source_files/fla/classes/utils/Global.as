package classes.utils 
{
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.display.Stage;
	import com.asual.swfaddress.SWFAddress;
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class Global
	{
		public static var palco:Stage;
		public static var secao1:String = "dummy";
		public static var secao2:String = "dummy";
		public static var secao3:String = "dummy";
		public static var proximaSecao:String = "";
		public static var url:String = "";
		public static var secaoAtual:String = "dummy";
		public static var xml:XML;
		
		public function Global() 
		{
			
		}
		
		public static function pegarValores():Array
		{
			var array:Array = SWFAddress.getValue().split("/");
			return array;
		}
		
		public static function formatAsURL(t:String):String
        {
			var arrPatterns:Array = new Array();
			arrPatterns.push( { pattern:/[äáàâãª]/g,  char:'a' } );
			arrPatterns.push( { pattern:/[ÄÁÀÂÃ]/g,  char:'A' } );
			arrPatterns.push( { pattern:/[ëéèê]/g,   char:'e' } );
			arrPatterns.push( { pattern:/[ËÉÈÊ]/g,   char:'E' } );
			arrPatterns.push( { pattern:/[íîïì]/g,   char:'i' } );
			arrPatterns.push( { pattern:/[ÍÎÏÌ]/g,   char:'I' } );
			arrPatterns.push( { pattern:/[öóòôõº]/g,  char:'o' } );
			arrPatterns.push( { pattern:/[ÖÓÒÔÕ]/g,  char:'O' } );
			arrPatterns.push( { pattern:/[üúùû]/g,   char:'u' } );
			arrPatterns.push( { pattern:/[ÜÚÙÛ]/g,   char:'U' } );
			arrPatterns.push( { pattern:/[ç]/g,   char:'c' } );
			arrPatterns.push( { pattern:/[Ç]/g,   char:'C' } );
			arrPatterns.push( { pattern:/[ñ]/g,   char:'n' } );
			arrPatterns.push( { pattern:/[Ñ]/g,   char:'N' } );
			
			function removeAccents( str:String ):String
			{
				for( var i:uint = 0; i < arrPatterns.length; i++ ){
				  
				 str = str.replace( arrPatterns[i].pattern, arrPatterns[i].char );
				  
				}
				 
				return str.toLowerCase();
			}
			
            var formatted:String = removeAccents(t);
            return formatted.replace(/ /g,"-");
        }
		
		public static function resetSections(_section1:String = "dummy", _section2:String = "dummy", _section3:String = "dummy"):void
		{
			secao1 = _section1;
			//secao2 = _section2;
			secao3 = _section3;
		}
		
		//debug
		public static function mostrarSecoes():String 
		{
			var texto:String = "Seção1: " + Global.secao1 + " ::: Seção2: " + Global.secao2 + " ::: Seção3: " + Global.secao3;
			return texto;
		}
	}

}