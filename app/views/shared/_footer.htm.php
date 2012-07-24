      
    </div> <!-- /container -->
  <footer class="row">
    <div class="span12 center">
      <p>piano.base <a href="http://www.pianolab.com.br/">@pianolabweb</a>. It's released under the MIT license.</p>
    </div>
  </footer>
  
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php Mapper::url("/scripts/libs/jquery.min.js"); ?>"><\/script>')</script>  
  <?php echo $html->script(array(
    'libs/bootstrap.min', 
    'libs/jcheck-0.7.1.min.js',
    'libs/jcheck.pt-br.js',
    'modules/prompt.modal.js'
  )); ?>
  <?php echo $this->scriptsForLayout; ?>
  <?php echo $this->element('shared/alert_modal'); ?>
  <?php echo $flash->flash(); ?>
  <?php echo $this->element('shared/analytics'); ?>
  </body>
</html>