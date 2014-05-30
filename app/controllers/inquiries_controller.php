<?php

class InquiriesController extends AppController
{
  public function index()
  {
    try {
      $connection = Inquiry::connection();

      $this->arrView["inquiry"] = $inquiry = new Inquiry;

      if ($this->is("post")) {
        $inquiry->set_attributes($this->data["inquiry"]);

        if ($inquiry->save()) {
          $inquiry->send_mail();
          $connection->commit();
          $this->FlashComponent->success("Sua mensagem foi enviado com sucesso.<br />Em breve entraremos em contato");
        }
        else {
          $this->FlashComponent->danger("Confira o formulário e preencha o correntamente");
        }
      }
    }
    catch (Exception $e) {
      $connection->rollback();
      $this->FlashComponent->danger($e->getMessage());
    }
  }
}