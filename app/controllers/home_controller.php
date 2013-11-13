<?php
class HomeController extends AppController {
  public function index() {
    $this->pageTitle('Home');
    
    $this->FlashComponent->success('Esta mensagem está em <code>' . str_replace(APP, null, __FILE__) . ' on line ' . __LINE__ . '</code>');
  }
}