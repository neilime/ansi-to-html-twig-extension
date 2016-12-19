Ansi-To-Html Twig Extension
=======================

[![Build Status](https://travis-ci.org/neilime/ansi-to-html-twig-extension.svg?branch=master)](https://travis-ci.org/neilime/ansi-to-html-twig-extension)
[![Latest Stable Version](https://poser.pugx.org/neilime/ansi-to-html-twig-extension/v/stable.svg)](https://packagist.org/packages/neilime/ansi-to-html-twig-extension)
[![Total Downloads](https://poser.pugx.org/neilime/ansi-to-html-twig-extension/downloads.svg)](https://packagist.org/packages/neilime/ansi-to-html-twig-extension)
[![Coverage Status](https://coveralls.io/repos/github/neilime/ansi-to-html-twig-extension/badge.svg?branch=master)](https://coveralls.io/github/neilime/ansi-to-html-twig-extension?branch=master)

Twig extension to convert ANSI escapes (terminal formatting/color codes) to HTML

# Helping Project

If this project helps you reduce time to develop and/or you want to help the maintainer of this project, you can make a donation, thank you.

<a href='https://pledgie.com/campaigns/33104'><img alt='Click here to lend your support to: Ansi-To-Html Twig Extension and make a donation at pledgie.com !' src='https://pledgie.com/campaigns/33104.png?skin_name=chrome' border='0' ></a>

# Contributing

If you wish to contribute to this project, please read the [CONTRIBUTING.md](CONTRIBUTING.md) file.
NOTE : If you want to contribute don't hesitate, I'll review any PR.

# Requirements

Name | Version
-----|--------
[php](https://secure.php.net/) | >=5.3.3
[neilime/ansi-escapes-to-html](https://github.com/neilime/ansi-escapes-to-html) | >=1.0.1

# Features

 * Filter support :
```twig
"{{ 'Default ESC[34mBlue'|ansitohtml }}"
```

# Installation

Update your `composer.json`:

```json
{
  "require": {
        "neilime/ansi-to-html-twig-extension": "1.*.*"
    }
}
```

## Usage

### Twig Extension

The Twig extension provides the `ansitohtml` tag and filter support.

Assumed that you are using [composer](http://getcomposer.org) autoloading.

Adds the extension to the Twig environment:
```php
$twig->addExtension(new \Twig\Extension\AnsiToHtmlExtension());
```
### Twig Token Parser

The Twig token parser provides the `ansitohtml` tag :
```php
$twig->addTokenParser(new \Twig\TokenParser\AnsiToHtmlTokenParser());
```
