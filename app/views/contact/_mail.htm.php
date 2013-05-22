<div class="row well">
  <div class="span5">
    <h1>Formulário de contato</h1>
    <hr />
    <ul>
      <li><strong>Nome: </strong><?php echo $data['name']; ?></li>
      <li><strong>E-mail: </strong><?php echo $data['email']; ?></li>
      <li><strong>Assunto: </strong><?php echo $data['subject']; ?></li>
      <li><strong>Telefone: </strong><?php echo $data['phone']; ?></li>
      <li><strong>Mensagem: </strong><?php echo $data['message']; ?></li>
    </ul>
    <hr />
    <p><small>Mensagem enviada ás: <?php echo date('d/m/Y H:i:s'); ?> diretamente do website <?php echo APP_NAME; ?>.</small></p>
    
  </div>
</div>