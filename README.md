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
<?php echo $html->tag('p','content for tag', array('class' => 'class-name')); ?>
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
<?php echo $html->link('Home','/home', array('title' => 'Go to the home'), true); ?>
```
```html
<a title="Go to the home" href="http://domain.com/home">Home</a>
```

- With incomplete URL

```php
<?php echo $html->link('Home','/home', array('title' => 'Go to the home')); ?>
```
```html
<a title="Go to the home" href="/home">Home</a>
```
- With remote URL

```php
<?php echo $html->link('Google','http://google.com', array('target' => '_blank')); ?>
```
```html
<a target="_blank" href="http://google.com">Google</a>
```
