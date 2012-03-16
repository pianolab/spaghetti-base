<?php
class AppModel extends Model {
	/**
	 * Check for equal information in database based on cantBeEqualFields public variable of each model
	 */ 
	public function hasEqualInformations($data, $id = null) {
		$return = false;
		foreach ($this->cantBeEqualFields as $field):
			$conditions = ($id) ? array('id <>' => $id, "$field" => $data["$field"]) : array("$field" => $data["$field"]);
			if ($find_field = $this->first(array('conditions' => $conditions, 'recursion' => -1))):
				$return["$field"] = 'Já existe informações no banco de dados com os mesmos caracteres';
			endif;
		endforeach;
		return $return;
	}
	
	/**
	 * Loop to build a search query based on model searchableFields variable
	 */ 
	public function buildSearchQuery($param = null) {
		if ($param):
			$string = '%' . strip_tags($param) . '%';
			foreach ($this->searchableFields as $field):
				$conditions_or[$field . ' LIKE'] = $string;
			endforeach;
			return $conditions_or;
		else:
			return false;
		endif;
	}
	
	/**
	 * Useful latest method
	 */ 
	public function latest($limit = 10, $conditions = false) {
		return $this->all(array(
			'order' => $this->order,
			'limit' => $limit,
			'conditions' => $conditions
		));
	}
}