<?php
class DocsController extends AppController {
	public function developer_guide() {
		$args = func_get_args();
		$page = implode("/", $args);
		$this->set(array(
			"doc" => $this->Docs->first($page),
			"navigation" => $this->Docs->describe()
		));
	}
}