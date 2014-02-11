<?php $minify->jsAddExtraUrl(array(
  'vendors/uploadify/jquery.uploadify',
  'vendors/uploadify/jquery.uploadify.init',
  'modules/sample_uploadify'
)); ?>

<div class="row">
  <div class="col-md-12">
  <h2>Uploadify</h2>

  <?php echo $form->create('/uploadify', array('id' => 'form-upload', 'class' => 'form-horizontal')); ?>

  <?php echo $form->input('files', array(
    'label' => 'Uploadify multiple',
    'class' => 'uploadify',
    'type' => 'file',
  )); ?>

  <table class="table table-striped">
    <tbody id="newAttachments"></tbody>
  </table>

  <?php echo $form->close(); ?>
  </div>
</div>