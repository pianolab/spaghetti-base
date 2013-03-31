<?php

require_once APP . DS . 'vendor' . DS . 'mailer' . DS . 'Mailer.php';

class ContactController extends AppController {
  
  /**
   * Método de envio de e-mail padrão
   *
   * @return void
   * @author Djalma Araújo
   */
  public function index() {

    if(!empty($this->data)) {
      if ($this->Contact->Validate($this->data)) {
        $mailer = new Mailer(array(
          'from' => array($this->data['email'] => $this->data['name']),
          'to' => Config::read('Mailer.send.default'),
          'subject' => 'Formulário de Contato [ ' . Config::read('app.name') . ' ]',
          'views' => array(
            'text/plain' => 'contact/mail_contact.txt',
            'text/html' => 'contact/mail_contact.htm'
          ),
          'layout' => 'mail',
          'data' => array('data' => $this->data)
        ));

        if ($mailer->send()) {
          Session::writeFlash('site.alert', array('success', 'Sua mensagem foi enviada com sucesso. <br /> Entreremos em contato com você o mais breve possível. Obrigado.'));
          $this->redirect('/');
        } else {
          Session::writeFlash('site.alert', array('warning', 'Preencha os campos corretamente.'));
          Session::writeFlash('form.data', $this->data);
          $this->redirect('/contato');
        }
      } else {
        Session::writeFlash('site.alert', array('error', $this->Contact->errors));
        Session::writeFlash('form.data', $this->data);
        $this->redirect('/contato');
      }
    }
  }
}
