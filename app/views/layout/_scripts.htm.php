<script type="text/javascript">var base_url = "<?php echo Mapper::url("/") ?>/";var base_path = "<?php echo Mapper::url("/", false) ?>/";</script>
<?php echo $html->script(array(
  # jQuery v1.11.1
  "vendors/jquery/jquery",
  # Bootstrap v3.0.2
  "vendors/bootstrap/bootstrap",
  "vendors/bootstrap/prompt.modal",
  # Modernizr v2.8.2
  "vendors/modernizr",
  # jquery.meio.mask 1.1.14
  "vendors/meiomask/meiomask",
  "vendors/meiomask/meiomask.init",
  # jQuery Validation Plugin 1.11.1
  "vendors/validate/jquery.validate",
  "vendors/validate/jquery.validate.init"
), array(), true); ?>

<?php echo $this->scriptsForLayout; ?>