<!-- Example row of columns -->

<?php $html->script(array('jcheck/contact'), array(), false, true); ?>
<div class="row">
  <div class="span12">
  <h2>Contato</h2>
  
  <?php echo $form->create('/contato', array('id' => 'form-contact')); ?>

  <?php echo $form->input('name', array(
    'label' => 'Nome', 
    'placeholder' => 'Digite seu nome',
  )); ?>

  <?php echo $form->input('email', array(
    'label' => 'Email', 
    'placeholder' => 'Digite um email válido',
  )); ?>

  <?php echo $form->input('phone', array(
    'label' => 'Fone', 
    'placeholder' => 'Só números',
    'alt' => 'phone', 
  )); ?>

  <?php echo $form->input('message', array(
    'label' => 'Mensagem', 
    'placeholder' => 'Escreva sua mensagem',
    'type' => 'textarea', 
  )); ?>

  <?php echo $form->input(null, array(
    'label' => null, 
    'type' => 'submit', 
    'value' => 'Enviar Formulário',
    'class' => 'btn btn-large btn-primary', 
  )); ?>
  
  <?php echo $form->close(); ?>
  </div>
</div>