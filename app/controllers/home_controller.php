<?php
class HomeController extends AppController {
	public $uses = array();
	public function index() {
		Session::writeFlash('site.alert', array('info', 'testandp'));
	}
}