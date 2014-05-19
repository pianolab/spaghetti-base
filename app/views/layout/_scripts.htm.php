<script type="text/javascript">var base_url = "<?php echo Mapper::url("/") ?>/";var base_path = "<?php echo Mapper::url("/", false) ?>/";</script>
<?php echo $html->script(array(
  # jQuery v1.10.2
  "vendors/jquery/jquery",
  # Bootstrap v3.0.2
  "vendors/bootstrap/bootstrap",
  "vendors/bootstrap/prompt.modal",
  # Modernizr 2.7.0 (Custom Build)
  "vendors/modernizr",
  # jquery.meio.mask 1.1.11
  "vendors/meio.mask/jquery.meio.mask",
  "vendors/meio.mask/jquery.meio.mask.init",
  # jQuery Validation Plugin 1.11.1
  "vendors/validate/jquery.validate",
  "vendors/validate/jquery.validate.init"
), array(), true); ?>

<?php echo $this->scriptsForLayout; ?>