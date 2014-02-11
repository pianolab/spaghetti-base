<h1>Formulário de contato</h1>
<hr />
<p><strong>Nome: </strong><?php echo $contact['name']; ?></p>
<p><strong>E-mail: </strong><?php echo $contact['email']; ?></p>
<p><strong>Assunto: </strong><?php echo $contact['subject']; ?></p>
<p><strong>Telefone: </strong><?php echo $contact['phone']; ?></p>
<p><strong>Mensagem: </strong><?php echo $contact['message']; ?></p>
<hr />
<p><small>Mensagem enviada ás: <?php echo date('d/m/Y H:i:s'); ?> diretamente do website <?php echo APP_NAME; ?>.</small></p>
