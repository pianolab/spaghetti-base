<?php if(!empty($attachment)): ?>
<tr>
  <td class="preview action">
    <?php echo $html->image(UPLOAD_URL . "/" . $folder . "/" . $attachment->file_name) ?>
  </td>
  <td class="inputLabel">
    <?php $fieldname = "attachment[" . $attachment->id . "][label]";
    echo $form->input($fieldname, array(
      "label" => "", "div" => false,
      "class" => "form-control input-sm",
      "placeholder" => "Digite o legenda da imagem",
      "value" => $attachment->label,
    )); ?>
  </td>
  <td>
    <?php echo $attachment->origin_name ?> -
    <small>[ <?php echo $attachment->size() ?> KB ]</small>
  </td>
  <td class="action">
    <a class="btn btn-info btn-xs" href="<?php echo Mapper::url("/upload/" . $folder . "/" . $attachment->file_name); ?>" data-toggle="lightbox" data-gallery="mixedgallery">
      <i class="glyphicon glyphicon-eye-open"></i> <span>ver imagem</span>
    </a>
  </td>
  <td class="action">
    <a class="btn btn-danger btn-xs" href="<?php echo Mapper::url("/" . $folder . "/remove_attachment/" . $attachment->id, true) ?>">
      <i class="glyphicon glyphicon-trash"></i> <span>apagar</span>
    </a>
  </td>
</tr>
<?php endif ?>