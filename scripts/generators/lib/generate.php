<?php
/**
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2010, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 * Generators for Spaghetti Framework 0.2 (@djalmaaraujo - http://www.djalmaaraujo.com.br/)
 * 
 **/
class Generate
{
	private $args;
	private $return;
	
	public function __construct($args)
	{
		if ($args):
			$this->setArgs($args);
		endif;
	}

	public function start()
	{
		$args = $this->getArgs();	
		switch ($args->type):
			case 'model':
				require_once('model.php');
				$model = new Model($args);
				$this->return = $model->match();
				break;
			case 'view':
				require_once('view.php');
				$view = new View($args);
				$this->return = $view->match();
				break;
			case 'controller':
				require_once('controller.php');
				$controller = new Controller($args);
				$this->return = $controller->match();
				break;
		endswitch;
		$this->output();
	}
	
	private function output()
	{
		foreach ($this->return as $msg):
			echo "* " . $msg;
			echo "\n";
		endforeach;
	}
	
	private function setArgs($args)
	{
		$this->args = $args;
	}
	
	private function getArgs()
	{
		return $this->args;
	}
}