<?php
require_once 'lib/utils/Mailer.php';
class ContactController extends AppController {

	public $uses = array();
    public function index() {
        if(!empty($this->data)):
    			if ($this->Contact->Validate($this->data)):
    				$mailer = new Mailer(array(
    					'from' => array($this->data['email'] => $this->data['nome']),
    					'to' => 'email@pianolab.com.br',
    					'subject' => 'Formulário de Contato',
    					'views' => array(
    					'text/plain' => 'contact/mail_contact.txt',
    					'text/html' => 'contact/mail_contact.htm'
    					),
    					'data' => array(
    									'data' => $this->data
    					)));
    					
    					if ($mailer->send()):
    						Session::writeFlash('system.alert', 'Sua mensagem foi enviada com sucesso. <br /> Entreremos em contato com você o mais breve possível. Obrigado.');
    						$this->redirect('/');
    					else:
    						Session::writeFlash('system.alert', 'Preencha os campos corretamente.');
    						Session::writeFlash('form.data', $this->data);
    						$this->redirect('/fale-conosco');
    					endif;
    			else:
    				Session::writeFlash('system.alert', $this->Contact->errors);
    				Session::writeFlash('form.data', $this->data);
    				$this->redirect('/fale-conosco');
    			endif;
        endif;
    }
}
?>