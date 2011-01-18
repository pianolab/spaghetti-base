<?php
/**
 *  AppModel é o model usado como base para todos os outros models da aplicação.
 *  Como está na biblioteca, é usado apenas quando não houver outro AppModel
 *  definido pelo usuário.
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */
    
class AppModel extends Model {
	/**
	 * Check for equal information in database based on cantBeEqualFields public variable of each model
	 */ 
	public function hasEqualInformations($data, $id = null)
	{
		$return = false;
		foreach ($this->cantBeEqualFields as $field):
			$conditions = ($id) ? array('id <>' => $id, "$field" => $data["$field"]) : array("$field" => $data["$field"]);
			if ($find_field = $this->first(array('conditions' => $conditions, 'recursion' => -1))):
				$return["$field"] = 'Já existe informações no banco de dados com os mesmos caracteres';
			endif;
		endforeach;
		return $return;
	}
}