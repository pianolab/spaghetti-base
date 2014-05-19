<?php
class AppModel extends Model
{
  public function search($query) {
    if (empty($query) || empty($this->searchableFields)) return array();

    ## Preparate to make the query
    $query = strtolower($query);
    $query = strip_tags($query);
    $words = explode(" ", $query);

    // $searchFields = "Notícias";

    foreach ($words as $key => $word) {
      if (strlen($word) < 3) unset($words[$key]);
    } # endforeach;

    foreach ($this->searchableFields as $key => $field) {
      $conditions[] = $field . " LIKE \"%" . $query . "%\"";
      foreach ($words as $word) {
        $conditions[] = $field . " LIKE \"%" . $word . "%\"";
      } # endforeach;
    } # endforeach;

    ## Make sql query
    $sql = "";
    foreach ($conditions as $key => $cond) {
      $sql .= $key == 0 ? $cond : " OR " . $cond;
    } # endforeach;

    ## Execute sql query
    $sql = "SELECT * FROM " . $this->table . " WHERE ( " . $sql . " )";

    $title = empty($this->seachTitle) ? "title" : $this->seachTitle;
    $text = empty($this->seachText) ? "text" : $this->seachText;
    $image = empty($this->seachImage) ? "image" : $this->seachImage;

    foreach ($this->fetch($sql) as $key => $data) {
      $return[$key]["id"] = $data["id"];
      $return[$key]["title"] = $data[$title];
      $return[$key]["text"] = substr(strip_tags($data[$text]), 0, 255);
      $return[$key]["image"] = $data[$image];
    }

    return $return;
  }
}