<?php

App::import("Vendor", "mailer" . DS . "Mailer");

class ContactController extends AppController
{
  public function index()
  {
    if(!empty($this->data)) {
      if ($this->Contact->Validate($this->data)) {
        $mailer = new Mailer(array(
          "from" => array(MAILER_SMTP_USERNAME => "Contato"),
          "to" => MAILER_SEND_DEFAULT,
          "subject" => "Formulário de Contato [ " . APP_NAME . " ]",
          "views" => array(
            "text/plain" => "contact/mail.txt",
            "text/html" => "contact/mail.htm"
          ),
          "layout" => "mail",
          "data" => array("contact" => $this->data)
        ));

        if ($mailer->send()) {
          $this->FlashComponent->success("Sua mensagem foi enviada com sucesso. <br /> Entraremos em contato com você o mais breve possível. Obrigado.");
          $this->redirect("/");
        }
        else {
          $this->FlashComponent->warning("Preencha os campos corretamente.");
          Session::writeFlash("form.data", $this->data);
          $this->redirect("/contato");
        }
      }
      else {
        $this->FlashComponent->error($this->Contact->errors);
        Session::writeFlash("form.data", $this->data);
        $this->redirect("/contato");
      }
    }
  }
}