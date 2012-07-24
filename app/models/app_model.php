<?php
class AppModel extends Model {
  
  /**
   * Checa se há no banco de dados informações
   * para os campos definidos na variável "cantBeEqualFields"
   *
   * @param string $data 
   * @param string $id 
   * @return void
   * @author Djalma Araújo
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
   * Método utilitário para popular o array
   * de condições para uma busca, utilizando
   * o "or" e "LIKE"
   *
   * @param string $param 
   * @return void
   * @author Djalma Araújo
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
   * Pega últimos registros do moelo
   * passando condições como opcional
   *
   * @param string $limit 
   * @param string $conditions 
   * @return void
   * @author Djalma Araújo
   */
  public function latest($limit = 10, $conditions = false) {
    return $this->all(array(
      'order' => $this->order,
      'limit' => $limit,
      'conditions' => $conditions
    ));
  }
  
  
  /**
   * Gera um TOKEN padrão. Caso seja passado
   * um array com o campo created, será 
   * influenciado.
   *
   * @param string $data 
   * @return void
   * @author Djalma Araújo
   */
  public function generateToken($data = null) {
    $default = date('Y-m-d H:i:s') . date('Y-m-d H:i:s') . rand(rand(1,100),9);
    $content = ($data) ? substr(md5($data['created']), 0, 7) . $default : $default;
    return sha1($content);
  }
}