package classes.events 
{
	import flash.events.Event;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class Cadastrar extends Event 
	{
		public static const CADASTROU:String = "cadastrou";
		public static const USUARIO_EXISTENTE:String = "usuarioExistente";
		public static const ERRO_AO_CADASTRAR:String = "erroAoCadastrar";
		
		public function Cadastrar(type:String, bubbles:Boolean=false, cancelable:Boolean=false) 
		{ 
			super(type, bubbles, cancelable);
			
		} 
		
		public override function clone():Event 
		{ 
			return new Cadastrar(type, bubbles, cancelable);
		} 
		
		public override function toString():String 
		{ 
			return formatToString("Cadastrar", "type", "bubbles", "cancelable", "eventPhase"); 
		}
		
	}
	
}