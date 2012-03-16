<?php
class LangController extends AppController {
	public $uses = array();
	public function change($lang) {
		$this->LangComponent->setLang($lang);
		$this->redirect($this->urlHistory);
	}
}