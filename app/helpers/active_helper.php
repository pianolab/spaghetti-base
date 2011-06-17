<?php

/**
 ************************************************************************
 **		Active Helper 
 ************************************************************************
 *
 * 		Add a class active if is the current page
 * 		by Bruno Silva ( @brunoz__ )
 *
 *		USAGE:
 * 
 * 		$page String:  Current page name.
 * 		$has_classes Boolean: If already have another html class
 * 
 * 		$active->add($page, $has_classes);
 * 
 */

class ActiveHelper extends Helper{

	public $current_page;
	
	public function __construct(){
		$active = explode('/', Mapper::here());
		$this->current_page = $active[1];
	}

	public function add($page = null, $has_classes = false){
		if(isset($page)):
			if($this->current_page == $page):
				if(!$has_classes):
					echo 'class="active"';
				else:
					echo ' active';
				endif;
			endif;
		endif;
	}
}

?>
