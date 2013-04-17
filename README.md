pianolab.base (SpaghettiPHP framework + Bootstrap, from Twitter (v2.0.2))
=========

Spaghetti* is a framework written in PHP to help make your day-to-day life more productive and fun.
### Contains

Full MVC Structure (Spaghetti Framework)
Full bootstrap + JS plugins + GRID system (Bootstrap, from Twitter)
E-mail Component (Swift Mailer)
Text, Date, Currency, Youtube.. Helpers
Lot of snippets (Facebook tags, Analytics, mobile favicons, pagination example)

### HtmlHelper

<b>Creating tags in general</b>

<tt>tag($tag, $content, $attr, $empty)</tt>

- <b>@params</b>
  - <tt>string $tag</tt> Tag to be created;
  - <tt>string $content</tt> Content between the tags inserted;
  - <tt>array $attr</tt> Tag's attributes;
  - <tt>boolean $empty</tt> True to create an empty tag;
- <b>@return</b>: <tt>string</tt> HTML tag with its contents.

Creates HTML tags for opening and closing containing some content.

```php
$html->tag('p','content for tag', array('class' => 'class-name'));
```
```html
<p class="class-name">content for tag</p>
```
<b>Creating link</b>

<tt>link($text, $url = null, $attr = array(), $full = false)</tt>

- <b>@params</b>
  - <tt>string $text</tt> Content link
  - <tt>string $url</tt> URL relative to the application root
  - <tt>array $attr</tt> Attributes tag
  - <tt>boolean $full</tt> True to generate a complete URL
- <b>@return</b>: <tt>string</tt> HTML Link

- With complete URL 

```php
echo $html->link('Home','/home', array('title' => 'Go to the home'), true);
```
```html
<a title="Go to the home" href="http://domain.com/home">Home</a>
```

- With incomplete URL

```php
$html->link('Home','/home', array('title' => 'Go to the home'));
```
```html
<a title="Go to the home" href="/home">Home</a>
```

- With remote URL

```php
$html->link('Google','http://google.com', array('target' => '_blank'));
```
```html
<a target="_blank" href="http://google.com">Google</a>
```

<b>Creating image</b>

<tt>image($src, $attr = array(), $full = false)</tt>

- <b>@params</b>
  - <tt>string $url</tt> Path image
  - <tt>array $attr</tt> Tag attributes
  - <tt>boolean $full</tt> True to generate a complete URL
- <b>@return</b>: <tt>string</tt> HTML image to be inserted

- With complete URL

```php
$html->image('/picture.png', array('alt' => 'Sample picture'), true);
```
```html
<figure>
  <img alt="Google picture" title="Google picture" src="http://google.com/logo.png">
</figure>
```

- With incomplete URL

```php
$html->image('/picture.png', array('alt' => 'Sample picture'));
```
```html
<figure>
  <img alt="Sample picture" title="Sample picture" src="/images/picture.png">
</figure>
```

- With remote URL

```php
$html->image('http://google.com/logo.png', array('alt' => 'Google picture'));
```
```html
<figure>
  <img alt="Google picture" title="Google picture" src="http://google.com/logo.png">
</figure>
```

- With text before

```php
$html->image('http://google.com/logo.png', array('alt' => 'Google picture', 'before' => 'something before...'));
```
```html 
<figure>
  <div>something before...</div>
  <img alt="Google picture" title="Google picture" src="http://google.com/logo.png">
</figure>
```

- With text after

```php
$html->image('http://google.com/logo.png', array('alt' => 'Google picture', 'after' => 'something after...'));
```
```html
<figure>
  <img alt="Google picture" title="Google picture" src="http://google.com/logo.png">
  <div>something after...</div>
</figure>
```

- Without figure

```php
$html->image('http://google.com/logo.png', array('alt' => 'Google picture', 'figure' => false));
```
```html
<img alt="Google picture" title="Google picture" src="http://google.com/logo.png">
```

<b>Creating image with link</b>

<tt>imagelink($src, $url, $img_attr, $attr, $full)</tt>

- <b>@params</b>
  - <tt>string $src</tt> path of the style sheet to be inserted into the HTML
  - <tt>string $url</tt> URL relative to the application root
  - <tt>array $img_attr</tt> Attributes tag
  - <tt>array $attr</tt> True to print stylesheet inline
  - <tt>boolean $full</tt> True to generate a complete URL
- <b>@return</b>: <tt>string</tt> element stylesheet to be used.

```php
$html->imagelink('http://google.com/logo.png', 'http://google.com', array('alt' => 'Google picture'));
```
```html
<a href="http://google.com">
  <figure>
    <img alt="Google picture" title="Google picture" src="http://google.com/logo.png">
  </figure>
</a>
```
<b>Obs</b>: <i>All examples used in the method <code>image</code> can be used in the method <code>imagelink</code></i>

<b>Insert stylesheet</b>

<tt>stylesheet($href, $attr, $inline, $full)</tt>

- <b>@params</b>
  - <tt>string $href</tt> path of the style sheet to be inserted into the HTML
  - <tt>array $attr</tt> Attributes tag
  - <tt>boolean $inline</tt> True to print stylesheet inline
  - <tt>boolean $empty</tt> True to generate a complete URL
- <b>@return</b>: <tt>string</tt> element stylesheet to be used.

Creates sheet elements style for use in HTML.

```php
$html->stylesheet(array('screen'), array(), false); 
```
```html
<link href="/styles/screen.css" rel="stylesheet" type="text/css" />
```

<b>Obs</b>: <i>only use the echo <tt>if $inline == true</tt></i>

<b>Insert javascript</b>

<tt>script($src, $attr, $inline, $full)</tt>

- <b>@params</b>
  - <tt>string $src</tt> Path to the script in HTML inseido
  - <tt>array $attr</tt> Attributes tag
  - <tt>boolean $inline</tt> True to print the inline script
  - <tt>boolean $empty</tt> True to generate a complete URL
- <b>@return</b>: <tt>string</tt> Element script to be used

Creates a script element to be used in HTML.
```php
$html->script(array('jquery'), array(), false); 
```
```html
<script src="/scripts/jquery.js" type="text/javascript"></script>
```
<b>Obs</b>:<i> only use the echo <tt>if $inline == true</tt></i>

### FormHelper

<b>Create form</b>

<tt>create($action, $options)</tt>
- <b>@params</b>
  - <tt>string $action</tt> Current action model
  - <tt>array $options</tt> Attributes tag
- <b>@return</b>: <tt>string</tt> FORM tag open and formatted

Returns an HTML element of the form formatted.

```php
$form->create('/action', array('id' => 'form-id'));
```
```html
<form method="post" action="http://domain.com/action" id="form-id">
```

<b>Close form</b>

<tt>close($submit, $attributes)</tt>
- <b>@params</b>
  - <tt>string $submit</tt> Button and send the form
  - <tt>array $attributes</tt> Attributes of button
- <b>@return</b>: <tt>string</tt> Tag FORM fechada and button if exist

Closes an HTML form element according to the attributes passed.

```php
$form->close('Send', array('class' => 'btn'));
```
```html
  <button type="submit" class="btn">Send</button>
</form>
```
or
```php
$form->close();
```
```html
</form>
```

###Copyright

piano.base @pianolabweb. It's released under the MIT license