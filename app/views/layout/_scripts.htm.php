<script type="text/javascript">
  var base_url = "<?php echo Mapper::url("/") ?>/";
  var base_path = "<?php echo Mapper::url("/", false) ?>/";
</script>

<?php echo $javascripts->scripts(); ?>

<?php echo $this->scriptsForLayout; ?>