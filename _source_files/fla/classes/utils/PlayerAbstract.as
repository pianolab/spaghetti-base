package classes.utils 
{
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import classes.utils.Global;
	import flash.geom.Rectangle;
	import com.greensock.TweenMax;
	import flash.net.URLRequest;
	import classes.events.PlayerPronto;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class PlayerAbstract extends MovieClip
	{
		private var tocador:MovieClip;
		public var loader:Loader;
		private var player:Object;
		private var duracaoTotal:Number;
		private var posicaoNova:Number;
		
		public function PlayerAbstract(_tocador:MovieClip, _container:MovieClip) 
		{
			tocador = _tocador;
			
			//vídeos
			loader = new Loader();
			loader.contentLoaderInfo.addEventListener(Event.INIT, videoInit);
			loader.load(new URLRequest("http://www.youtube.com/apiplayer?version=3"));
			_container.addChild(loader);
			
			Global.palco.addEventListener(PlayerPronto.PARAR_PLAYER, descarregarVideo);
		}
		
		private function descarregarVideo(event:PlayerPronto):void
		{
			trace("recebiiiiiiiiiiiii");
			//loader.unloadAndStop();
			//loader = null;
		}
		
		//VÍDEOS
		private function videoInit(event:Event):void
		{
			loader.content.addEventListener("onReady", onPlayerReady);
			loader.content.addEventListener("onStateChange", stateChange);
		}
		
		private function onPlayerReady(event:Event):void 
		{
			trace("player pronto");
			player = Sprite(loader.content);
			player.setSize(0, 0);
			iniciarTocador();
			Global.palco.dispatchEvent(new PlayerPronto(PlayerPronto.PRONTO));
		}
		
		private function stateChange(event:Event):void
		{
			if (Object(event).data == 0)
			{
				trace("O vídeo acabou");
			}
		}
		
		public function carregarVideo(_url:String):void
		{
			player.stopVideo();
			player.loadVideoByUrl(_url);
			player.setSize(480, 320);
			tocador.btnPlayPause.state = "pause";
			tocador.btnPlayPause.gotoAndStop("pause");
			player.pauseVideo();
		}
		
		//PLAYER DO VÍDEO
		private function iniciarTocador():void
		{
			tocador.btnPlayPause.buttonMode = true;
			tocador.btnPlayPause.state = "pause";
			tocador.btnPlayPause.addEventListener(MouseEvent.CLICK, playPauseVideo);
			
			tocador.btnSound.buttonMode = true;
			tocador.btnSound.state = "sound";
			tocador.btnSound.addEventListener(MouseEvent.CLICK, setVideoSound);
			
			tocador.seekBar.bola.buttonMode = true;
			tocador.seekBar.bola.isDrag = false;
			tocador.seekBar.bola.addEventListener(MouseEvent.MOUSE_DOWN, seekBarStartDrag);
			//tocador.seekBar.bola.addEventListener(MouseEvent.MOUSE_UP, seekBarStopDrag);
			tocador.seekBar.bola.addEventListener(Event.ENTER_FRAME, seekBarFrameHandler);
			
			tocador.seekBar.base.addEventListener(MouseEvent.CLICK, verificarPosicaoClicada);
		}
		
		private function seekBarStartDrag(event:MouseEvent):void
		{
			Global.palco.addEventListener(MouseEvent.MOUSE_UP, seekBarStopDrag);
			tocador.seekBar.bola.startDrag(true, new Rectangle(0, 0, tocador.seekBar.base.width, 0));
			tocador.seekBar.bola.isDrag = true;
		}
		
		private function seekBarStopDrag(event:MouseEvent):void
		{
			Global.palco.removeEventListener(MouseEvent.MOUSE_UP, seekBarStopDrag);
			tocador.seekBar.bola.stopDrag();
			tocador.seekBar.bola.isDrag = false;
		}
		
		private function seekBarFrameHandler(event:Event):void
		{
			duracaoTotal = player.getDuration();
			var posicaoAtual:Number = player.getCurrentTime();
			if (!tocador.seekBar.bola.isDrag)
			{
				tocador.seekBar.bola.x = (tocador.seekBar.base.width - (tocador.seekBar.bola.width/2))/(duracaoTotal/posicaoAtual);
			}else {
				posicaoNova = duracaoTotal / (tocador.seekBar.base.width/tocador.seekBar.bola.x);
				player.seekTo(posicaoNova, true);
			}
		}
		
		private function verificarPosicaoClicada(event:MouseEvent):void
		{
			posicaoNova = duracaoTotal / (tocador.seekBar.base.width/tocador.seekBar.mouseX);
			player.seekTo(posicaoNova, true);
		}
		
		private function playPauseVideo(event:MouseEvent):void
		{
			switch(tocador.btnPlayPause.state)
			{
				case "pause":
					tocador.btnPlayPause.state = "play";
					tocador.btnPlayPause.gotoAndStop("play");
					player.playVideo();
					break;
					
				case "play":
					tocador.btnPlayPause.state = "pause";
					tocador.btnPlayPause.gotoAndStop("pause");
					player.pauseVideo();
					break;
			}
		}
		
		private function setVideoSound(event:MouseEvent):void
		{
			switch(tocador.btnSound.state)
			{
				case "sound":
					tocador.btnSound.state = "mute";
					tocador.btnSound.gotoAndStop("mute");
					player.setVolume(0);
					break;
					
				case "mute":
					tocador.btnSound.state = "sound";
					tocador.btnSound.gotoAndStop("sound");
					player.setVolume(100);
					break;
			}
		}
		
		private function sumirTocador():void
		{
			tocador.alpha = 0;
			tocador.visible = false;
		}
		
		private function sumirPlayer():void
		{
			
		}
		
	}

}