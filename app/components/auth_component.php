<?php
/**
 *  AuthComponent é o responsável pela autenticação e controle de acesso na aplicação.
 *  Esta versão do AuthComponent é baseada em SESSÃO.
 *
 * 	Modificado por Djalma Araújo de Andrade - www.djalmaaraujo.com.br
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

class AuthComponent extends Component {
    /**
     *  Autorização para URLs não especificadas explicitamente.
     */
    public $authorized = true;
    /**
      *  Define se AuthComponent::check() será chamado automaticamente.
      */
    public $autoCheck = true;
    /**
     *  Instância do Controller.
     */
    public $Controller;
    /**
      *  Nomes dos campos do modelo a serem usados na autenticação.
      */
    public $fields = array(
        "id" => "id",
        "username" => "username",
        "password" => "password"
    );
    /**
      *  Método de hash a ser usado para senhas.
      */
    public $hash = "md5";
    /**
      *  Estado de autenticação do usuário corrente.
      */
    public $loggedIn;
    /**
      *  Action que fará login.
      */
    public $loginAction = "/users/login";
    /**
      *  URL para redirecionamento após o login.
      */
    public $loginRedirect = "/";
    /**
      *  Action que fará logout.
      */
    public $logoutAction = "/users/logout";
    /**
      *  URL para redirecionamento após o logout.
      */
    public $logoutRedirect = "/";
    /**
     *  Lista de permissões.
     */
    public $permissions = array();
    /**
      *  Usuário atual.
      */
    public $user = array();
    /**
      *  Nome do modelo a ser utilizado para a autenticação.
      */
    public $userModel = "Users";
    /**
      *  Condições adicionais para serem usadas na autenticação.
      */
    public $userScope = array();
    /**
      *  Define se o salt será usado como prefixo das senhas.
      */
    public $useSalt = true;
    /**
      * Define o prefixo da sessão do usuário logado
      */
    public $prefixCrypt = 'skjHASJKh';
    /**
      *  Define o nível de recursão do modelo.
      */
    public $recursion;
    /**
      *  Mensagem de erro para falha no login.
      */
    public $loginError = "loginFailed";
    /**
      *  Mensagem de erro para acesso não autorizado.
      */
    public $authError = "notAuthorized";
    
    public $authenticate = false;

    /**
      *  Inicializa o componente.
      *
      *  @param object $Controller Objeto Controller
      *  @return void
      */
    public function initialize(&$Controller) {
        $this->Controller = $Controller;
    }
    /**
      *  Faz as operações necessárias após a inicialização do componente.
      *
      *  @param object $Controller Objeto Controller
      *  @return void
      */
    public function startup(&$Controller) {
        $this->allow($this->loginAction);
        if($this->autoCheck):
            $this->check();
        endif;
        if(Mapper::match($this->loginAction)):
            $this->login();
        endif;
    }
    /**
      *  Finaliza o component.
      *
      *  @param object $Controller Objeto Controller
      *  @return void
      */
    public function shutdown(&$Controller) {
        if(Mapper::match($this->loginAction)):
            $this->loginRedirect();
        endif;
    }
    /**
      *  Verifica se o usuário está autorizado a acessar a URL atual, tomando as
      *  ações necessárias no caso contrário.
      *
      *  @return boolean Verdadeiro caso o usuário esteja autorizado
      */
    public function check() {
        if(!$this->authorized()):
            $this->setAction(Mapper::here());
            $this->error($this->authError);
            $this->Controller->redirect($this->loginAction);
            return false;
        endif;
        return true;
    }
    /**
     *  Verifica se o usuário esta autorizado ou não para acessar a URL atual.
     *
     *  @return boolean Verdadeiro caso o usuário esteja autorizado
     */
    public function authorized() {
        return $this->loggedIn() || $this->isPublic();
    }
    /**
      *  Verifica se uma action é pública.
      *
      *  @return boolean Verdadeiro se a action é pública
      */
    public function isPublic() {
        $here = Mapper::here();
        $authorized = $this->authorized;
        foreach($this->permissions as $url => $permission):
            if(Mapper::match($url, $here)):
                $authorized = $permission;
            endif;
        endforeach;
        return $authorized;
    }
    /**
     *  Libera URLs a serem visualizadas sem autenticação.
     *
     *  @param string $url URL a ser liberada
     *  @return void
     */
    public function allow($url = null) {
        if(is_null($url)):
            $this->authorized = true;
        else:
            $this->permissions[$url] = true;
        endif;
    }
    /**
     *  Bloqueia os URLS para serem visualizadas apenas com autenticação.
     *
     *  @param string $url URL a ser bloqueada
     *  @return void
     */
    public function deny($url = null) {
        if(is_null($url)):
            $this->authorized = false;
        else:
            $this->permissions[$url] = false;
        endif;
    }
    /**
     *  Verifica se o usuário está autenticado.
     *
     *  @return boolean Verdadeiro caso o usuário esteja autenticado
     */
    public function loggedIn() {
    	
    	$user_session = Session::read($this->prefixCrypt . 'user_logged');
        if(is_null($this->loggedIn)):
            $user = $user_session['user_id'];
            $password = $user_session["password"];
            if(!is_null($user) && !is_null($password)):
                $user = $this->identify(array(
                    $this->fields["id"] => $user,
                    $this->fields["password"] => $password
                ));
                return $this->loggedIn = !empty($user);
            else:
                return $this->loggedIn = false;
            endif;
            
        else:
        	return $this->loggedIn;
        endif;
    }
    /**
      *  Identifica o usuário no banco de dados.
      *
      *  @param array $conditions Condições da busca
      *  @return array Dados do usuário
      */
    public function identify($conditions) {
        $userModel = ClassRegistry::load($this->userModel);
        if(!$userModel):
            $this->error("missingModel", array("model" => $this->userModel));
            return false;
        endif;
        $params = array(
            "conditions" => array_merge(
                $this->userScope,
                $conditions
            ),
            "recursion" => is_null($this->recursion) ? $userModel->recursion : $this->recursion
        );
        return $this->user = $userModel->first($params);
    }
    /**
      *  Cria o hash de uma senha.
      *
      *  @param string $password Senha para ter o hash gerado
      *  @return string Hash da senha
      */
    public function hash($password) {
        return Security::hash($password, $this->hash, $this->useSalt);
    }
    /**
      *  Efetua o login do usuário.
      *
      *  @return void
      */
    public function login() {
    	if(!empty($this->Controller->data)):
            $password = $this->hash($this->Controller->data[$this->fields["password"]]);
            $user = $this->identify(array(
                $this->fields["username"] => $this->Controller->data[$this->fields["username"]],
                $this->fields["password"] => $password
            ));
            if(!empty($user)):
                $this->authenticate = true;
            else:
                $this->error($this->loginError);
            endif;
        endif;
    }
    
    public function loginRedirect() {
        if($this->authenticate):
            $this->authenticate($this->user["id"], $this->user["password"]);
            if($redirect = $this->getAction()):
                $this->loginRedirect = $redirect;
            endif;
            $this->Controller->redirect($this->loginRedirect);
        endif;
    }
    /**
      *  Autentica um usuário.
      *
      *  @param string $id ID do usuário
      *  @param string $password Senha do usuário
      *  @return void
      */
    public function authenticate($id, $password) {
    	Session::write($this->prefixCrypt . 'user_logged', array('user_id' => $id,'password' => $password));	
    }
    /**
      *  Efetua o logout do usuário.
      *
      *  @return void
      */
    public function logout() {
        Session::delete($this->prefixCrypt . 'user_logged');
        $this->Controller->redirect($this->logoutRedirect);
    }
    /**
      *  Retorna informações do usuário.
      *
      *  @param string $field Campo a ser retornado
      *  @return mixed Campo escolhido ou todas as informações do usuário
      */
    public function user($field = null) {
        if($this->loggedIn()):
            if(is_null($field)):
                return $this->user;
            else:
                return $this->user[$field];
            endif;
        else:
            return null;
        endif;
    }
    /**
      *  Armazena a action requisitada quando a autorização falhou.
      *
      *  @param string $action Endereço da action
      *  @return void
      */
    public function setAction($action) {
        Session::write("Auth.action", $action);
    }
    /**
      *  Retorna a action requisitada quando a autorização falhou.
      *
      *  @return string Endereço da action
      */
    public function getAction() {
        $action  = Session::read("Auth.action");
        Session::delete("Auth.action");
        return $action;
    }
    /**
      *  Define um erro ocorrido durante a autenticação.
      *
      *  @param string $type Nome do erro
      *  @param array $details Detalhes do erro
      *  @return void
      */
    public function error($type, $details = array()) {
        Session::writeFlash("Auth.error", $type);
    }
}

?>