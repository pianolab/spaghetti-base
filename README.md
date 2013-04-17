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
  - <tt>String $tag</tt> Tag to be created;
  - <tt>String $content</tt> Content between the tags inserted;
  - <tt>Array $attr</tt> Tag's attributes;
  - <tt>Boolean $empty</tt> True to create an empty tag;
- <b>@return</b>: <tt>String</tt> HTML tag with its contents.

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
  - <tt>String $text</tt> Content link
  - <tt>String $url</tt> URL relative to the application root
  - <tt>Array $attr</tt> Attributes tag
  - <tt>Boolean $full</tt> True to generate a complete URL
- <b>@return</b>: <tt>String</tt> HTML Link

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
  - <tt>String $url</tt> Path image
  - <tt>Array $attr</tt> Tag attributes
  - <tt>Boolean $full</tt> True to generate a complete URL
- <b>@return</b>: <tt>String</tt> HTML image to be inserted

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
  - <tt>String $src</tt> path of the style sheet to be inserted into the HTML
  - <tt>String $url</tt> URL relative to the application root
  - <tt>Array $img_attr</tt> Attributes tag
  - <tt>Array $attr</tt> True to print stylesheet inline
  - <tt>Boolean $full</tt> True to generate a complete URL
- <b>@return</b>: <tt>String</tt> element stylesheet to be used.

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
  - <tt>String $href</tt> path of the style sheet to be inserted into the HTML
  - <tt>Array $attr</tt> Attributes tag
  - <tt>Boolean $inline</tt> True to print stylesheet inline
  - <tt>Boolean $empty</tt> True to generate a complete URL
- <b>@return</b>: <tt>String</tt> element stylesheet to be used.

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
  - <tt>String $src</tt> Path to the script in HTML inseido
  - <tt>Array $attr</tt> Attributes tag
  - <tt>Boolean $inline</tt> True to print the inline script
  - <tt>Boolean $empty</tt> True to generate a complete URL
- <b>@return</b>: <tt>String</tt> Element script to be used

Creates a script element to be used in HTML.

```php
$html->script(array('jquery'), array(), false); 
```
```html
<script src="/scripts/jquery.js" type="text/javascript"></script>
```

<b>Obs</b>:<i> only use the echo <tt>if $inline == true</tt></i>

###Copyright

piano.base @pianolabweb. It's released under the MIT license