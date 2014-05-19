<!-- Example row of columns -->
<div class="row">
  <div class="col-md-6">
  <h2>Instructions</h2>
  <pre>
1. git clone git://github.com/pianolab/spaghetti-base.git
2. git remote rm origin
3. git remote add origin ssh://git@[ DOMAIN-DO-REPO ]/[ USERNAME ]/[ REPO-NAME ].git
4. git push -u origin --all
5. work!</pre>
  </div>

  <div class="col-md-6">
    <h2>Contains</h2>
    <ul>
      <li>Full MVC Structure (Spaghetti Framework)</li>
      <li>Full bootstrap + JS plugins + GRID system (Bootstrap, from Twitter)</li>
      <li>E-mail Component (Swift Mailer)</li>
      <li>Text, Date, Currency, Youtube.. Helpers</li>
      <li>Lot of snippets (Facebook tags, Analytics, mobile favicons, pagination example)</li>
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <h2>languages</h2>
    <pre>Arquivo em: <?php echo APP . DS . "languages" ?></pre>
    <?php echo $html->link(t("Português"), "/lang/change/pt-br") ?> |
    <?php echo $html->link(t("Inglês"), "/lang/change/en-us") ?><br>

    <?php echo t("wtf") ?> | <?php echo t("test") ?><br />
  </div>
</div>