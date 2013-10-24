<!-- base url -->
<script type="text/javascript">
  var base_url = "<?php echo Mapper::url('/', true); ?>";
  var base_path = "<?php echo Mapper::url('/', false); ?>";
</script> 
<!-- jQuery v1.10.2 -->
<?php echo $html->script('vendors/jquery/jquery.min'); ?> 
<!-- bootstrap -->
<?php echo $html->script(array('vendors/bootstrap/bootstrap.min', 'vendors/bootstrap/prompt.modal')); ?>
<!-- Modernizr 2.6.2 (Custom Build) -->
<?php echo $html->script('vendors/modernizr.min'); ?> 
<!-- jquery.meio.mask 1.1.11 -->
<?php echo $html->script(array('vendors/meio.mask/jquery.meio.mask.min','vendors/meio.mask/jquery.meio.mask.init')); ?>
<!-- jQuery Validation Plugin 1.11.1 -->
<?php echo $html->script(array('vendors/validate/jquery.validate.min','vendors/validate/jquery.validate.init')); ?>
<?php if (!empty($this->scriptsForLayout)): ?>
<!-- Extra styles -->
<?php echo $this->scriptsForLayout; ?>
<?php endif ?>