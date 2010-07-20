package classes.events 
{
	import flash.events.Event;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class ChamarFacebox extends Event 
	{
		public static const CARREGAR_IMG:String = "carregarImg";
		public var url:String;
		
		public function ChamarFacebox(type:String, _url:String, bubbles:Boolean = false, cancelable:Boolean = false) 
		{ 
			url = _url;
			super(type, bubbles, cancelable);
			
		} 
		
		public override function clone():Event 
		{ 
			return new ChamarFacebox(type, url, bubbles, cancelable);
		} 
		
		public override function toString():String 
		{ 
			return formatToString("ChamarFacebox", "type", "bubbles", "cancelable", "eventPhase"); 
		}
		
	}
	
}