<?php $html->script("modules/contact", array(), false, true); ?>

<div class="row">
  <div class="col-md-12">
    <h2>Contato</h2>
  </div>
</div>

<?php echo $bootstrap->create("/contato", array("object" => $inquiry, "id" => "form_new_inquiry", "class" => "form-horizontal")); ?>

  <div class="row">
    <?php echo $bootstrap->input("inquiry.name", array(
      "label" => "Nome",
      "placeholder" => "Digite seu nome",
    )); ?>
  </div>

  <div class="row">
    <?php echo $bootstrap->email("inquiry.email", array(
      "label" => "Email", "columns" => 4,
    )); ?>

    <?php echo $bootstrap->phone("inquiry.phone", array(
      "label" => "Fone", "columns" => 4,
    )); ?>

    <?php echo $bootstrap->datepicker("inquiry.born_in", array(
      "label" => "Data de nascimento", "columns" => 4,
    )); ?>
  </div>

  <div class="row">
    <?php echo $bootstrap->textarea("inquiry.message", array(
      "label" => "Mensagem",
      "placeholder" => "Escreva sua mensagem",
    )); ?>
  </div>

  <div class="row">
    <?php echo $bootstrap->submit("Enviar messagem"); ?>
  </div>

<?php echo $bootstrap->close(); ?>