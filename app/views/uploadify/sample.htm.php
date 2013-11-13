<?php $html->script(array('vendors/uploadify/jquery.uploadify.min','modules/uploadify'), array(), false); ?>

<div class="row">
  <div class="col-md-12">
  <h2>Upload multiplo</h2>
  
  <?php echo $form->create('/uploadify', array('id' => 'form-upload', 'class' => 'form-horizontal')); ?>

  <?php echo $form->input('files', array(
    'label' => 'Arquivos', 
    'class' => 'form-control uploadify', 
    'type' => 'file',
  )); ?>

  <table class="table table-striped">
    <tbody id="new-attachments"></tbody>
  </table>
  
  <?php echo $form->close(); ?>
  </div>
</div>