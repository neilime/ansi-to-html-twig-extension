# Installation

## Install this library using composer

```bash
composer require ansi-to-html-twig-extension
```

## Register the extension in your Twig environment

```php
$twig->addExtension(new \Twig\Extension\AnsiToHtmlExtension());
```

## Twig Token Parser

The Twig token parser provides the `ansitohtml` tag :

```php
$twig->addTokenParser(new \Twig\TokenParser\AnsiToHtmlTokenParser());
```
