<!-- Example row of columns -->
<div class="row">
  <div class="span6">
  <h2>Instructions</h2>
  <pre>
1. git clone https://pianolab@github.com/pianolab/spaghetti-base.git
2. remove .git folder
3. work!</pre>
  </div>

  <div class="span6">
    <h2>Contains</h2>
    <ul>
      <li>Full MVC Structure (Spaghetti Framework)</li>
      <li>Full bootstrap + JS plugins + GRID system (Bootstrap, from Twitter)</li>
      <li>E-mail Component (Swift Mailer)</li>
      <li>Text, Date, Currency, Youtube.. Helpers</li>
      <li>Lot of snippets (Facebook tags, Analytics, mobile favicons, pagination example)</li>
    </ul>
  </div>

<!--
```php
$form->create('/action', array('id' => 'form-id'));
```
```html
<form method="post" action="http://domain.com/action" id="form-id">
```
-->

<hr>
<?php echo $form->close('Send', array('class' => 'btn')); ?>
<hr>

  
  <div class="span12">
    <h2>languages</h2>
    <pre>Arquivo em: <?php echo APP . DS . 'languages' ?></pre>
    <?php echo $html->link(t('Português'), '/lang/change/pt-br') ?> | 
    <?php echo $html->link(t('Inglês'), '/lang/change/en-us') ?><br>
    
    <?php echo t('wtf') ?> | <?php echo t('test') ?><br />
  </div>
</div>