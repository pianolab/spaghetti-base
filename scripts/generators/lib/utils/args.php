<?php
/**
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2010, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 * Generators for Spaghetti Framework 0.2 (@djalmaaraujo - http://www.djalmaaraujo.com.br/)
 * 
 **/
 	 
class Args
{
	private $args;
	private $obj_args;
	
	public function Parse($args = null)
	{
		if ($args):
			
			//Set Args
			$this->setArgs($args);
			
			$args = $this->getArgs();
			$this->obj_args->type = $args[1];
			
			switch ($args[1]):
				case 'model':
					$this->obj_args->class			= 'Model';
					$this->obj_args->names 			= explode(',', $args[2]);
					$this->obj_args->table 			= ($args[3]) ? explode(',', $args[3]) : explode(',', $args[2]);
					break;
				case 'view':
					$this->obj_args->class			= 'View';
					$this->obj_args->folder 		= $args[2];
					$this->obj_args->files 			= explode(',', $args[3]);
					break;
				case 'controller':
					$this->obj_args->class			= 'Controller';
					if (substr($args[2],0,1) == '-'):
						$this->obj_args->params 	= str_split(substr($args[2],1,2));
						$this->obj_args->names 		= explode(',', $args[3]);
						$this->obj_args->methods 	= ($args[4]) ? explode(',', $args[4]) : array('index');
					else:
						$this->obj_args->params 	= false;
						$this->obj_args->names		= explode(',', $args[2]);
						$this->obj_args->methods 	= ($args[3]) ? explode(',', $args[3]) : array('index');
					endif;
					break;
			endswitch;
		else:
			die("Error: NEED ARGUMENTS, CHECK OUT scripts/generators/generate SOURCE FILE. SOMETHING IS MISSING. \n");
		endif;
		
		return $this->obj_args;
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