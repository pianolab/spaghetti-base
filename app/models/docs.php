<?php

class Docs extends Object {
    protected $navigation;
    protected $path = "docs/developer_guide";
    
    public function __construct() {
        $this->describe();
    }
    public function describe() {
        if(is_null($this->navigation)):
            ob_start();
            App::import("View", "{$this->path}/schema", "js");
            $this->navigation = json_decode(ob_get_clean());
        endif;
        return $this->navigation;
    }
    public function first($page) {
        if(empty($page)):
            $page = "index";
        endif;
        $path = APP . "/views/{$this->path}/" . Inflector::hyphenToUnderscore($page) . ".textile";
        $title = $this->title($page);
        $content = file_get_contents($path . $file);
        return compact("title", "content");
    }
	public function title($pages, $object = null) {
		if(is_null($object)):
			$object = $this->navigation;
		endif;
		$pages = explode("/", $pages);
		$page = array_shift($pages);
		if(!empty($pages)):
			$pages = implode("/", $pages);
			return $this->title($pages, $object->$page);
		else:
			return $object->$page;
		endif;
	}
}

?>