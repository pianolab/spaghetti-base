<h1>Formulário de contato</h1>
<hr />
<p><strong>Nome: </strong><?php echo $inquiry->name ?></p>
<p><strong>E-mail: </strong><?php echo $inquiry->email ?></p>
<p><strong>Telefone: </strong><?php echo $inquiry->phone ?></p>
<p><strong>Data Nascimento: </strong><?php echo $inquiry->born_in ?></p>
<p><strong>Mensagem: </strong><?php echo $inquiry->message ?></p>
<hr />
<p><small>Mensagem enviada ás: <?php echo date("d/m/Y H:i:s"); ?> diretamente do website <?php echo APP_NAME; ?>.</small></p>