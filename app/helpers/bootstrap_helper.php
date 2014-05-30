  <?php

class BootstrapHelper extends FormHelper
{
  public function create($action = null, $options = array())
  {
    $this->object = array_unset($options, "object");
    return parent::create($action, $options);
  }

  public function input($name, $options = array())
  {
    $options = array_merge(array(
      "object" => $this->object,
      "class" => "form-control",
    ), $options);

    $columns = array_unset($options, "columns");
    $columns = in_array(round($columns), array(1,2,3,4,5,6,7,8,9,10,11,12)) ? round($columns) : 12;
    $options["div"] = array("class" => "col-md-" . $columns);

    return parent::input($name, $options);
  }

  public function email($name, $options = array())
  {
    $options["placeholder"] = "Digite um email válido";
    return $this->input($name, $options);
  }

  public function textarea($name, $options = array())
  {
    $options["type"] = "textarea";
    $options["rows"] = 7;
    return $this->input($name, $options);
  }

  public function datepicker($name, $options = array())
  {
    $options = array_merge(array(
      "placeholder" => "Ex: AAAA-MM-DD"
    ), $options);

    $options["class"] = "form-control datepicker";
    $options["alt"] = "date-us";
    return $this->input($name, $options);
  }

  public function phone($name, $options = array())
  {
    $options["alt"] = "phone";
    $options["placeholder"] = "Só números";
    return $this->input($name, $options);
  }

  public function submit($label, $options = array())
  {
    $options = array_merge(array(
      "label" => null,
      "type" => "submit",
      "object" => "",
      "value" => $label,
      "class" => "btn btn-lg btn-block btn-primary",
    ), $options);
    return $this->input($name, $options);
  }
}