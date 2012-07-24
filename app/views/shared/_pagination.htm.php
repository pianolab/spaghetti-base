<ul id="pagination">
  <?php $pagination->model($model); ?>
  <?php echo $pagination->numbers(array('tag' => 'li')); ?>
</ul>