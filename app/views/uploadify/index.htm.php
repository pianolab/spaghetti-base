<?php if(!empty($attachment)): ?>
<tr>
  <td class="preview">
    <?php echo $html->image(UPLOAD_URL . '/folder-name/' . $attachment->file_name) ?>
  </td>
  <td>
    <?php echo $html->link($attachment->origin_name, '/upload/folder-name/' . $attachment->file_name) ?>
  </td>
  <td>
    <?php echo number_format($attachment->size / 1024, 1) ?> KB
  </td>
  <td>
    <?php echo $attachment->type ?>
  </td>
  <td class="action">
    <button class="btn btn-danger btn-xs" data-url="<?php echo '#attachments/remove/' . $attachment->id, array('class') ?>">
      <i class="glyphicon glyphicon-trash"></i>
      <span>Delete</span>
    </button>
  </td>
</tr>
<?php endif ?>