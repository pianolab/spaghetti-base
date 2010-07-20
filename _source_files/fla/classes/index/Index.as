package classes.index 
{
	import flash.display.MovieClip;
	import flash.events.Event;
	import classes.utils.Global;
	import classes.utils.Navigation;
	import classes.utils.MenuContexto;
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class Index extends MovieClip
	{
		private var i:int;
		
		public function Index() 
		{
			if (stage) {
				init();
			}else {
				addEventListener(Event.ADDED_TO_STAGE, init);
			}
		}
		
		//init
		private function init(event:Event = null):void
		{
			//removelistener
			removeEventListener(Event.ADDED_TO_STAGE, init);
			
			//global
			Global.palco = stage;
			
			//navigation
			var navigation:Navigation = new Navigation(container);
			
			//context
			var menuContexto:MenuContexto = new MenuContexto(this);
		}
	}
}