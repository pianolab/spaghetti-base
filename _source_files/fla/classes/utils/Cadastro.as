package classes.utils 
{
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.net.URLRequestMethod;
	import flash.net.URLVariables;
	import classes.utils.Global;
	import classes.events.Cadastrar;
	
	/**
	 * ...
	 * @author Pedro Gabriel
	 */
	public class Cadastro extends MovieClip
	{
		private var user:String;
		private var password:String;
		private var carregadorCadastro:URLLoader;
		
		public function Cadastro(_args:Object, _url:String):void 
		{	
			var variaveis:URLVariables = new URLVariables();
			for (var prop:* in _args) {
				variaveis[prop] = _args[prop];
			}
			trace(variaveis);
			var requisicao:URLRequest = new URLRequest(_url);
			requisicao.method = URLRequestMethod.POST;
			requisicao.data = variaveis;
			
			carregadorCadastro = new URLLoader(requisicao);
			carregadorCadastro.addEventListener(Event.COMPLETE, pegarResposta);
			
		}
		
		private function pegarResposta(event:Event):void
		{
			if (event.target.data == "0") {
				Global.palco.dispatchEvent(new Cadastrar(Cadastrar.ERRO_AO_CADASTRAR));
			}else if (event.target.data == "1") {
				Global.palco.dispatchEvent(new Cadastrar(Cadastrar.USUARIO_EXISTENTE));
			}else{
				Global.palco.dispatchEvent(new Cadastrar(Cadastrar.CADASTROU));
			}
		}
		
	}

}