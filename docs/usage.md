## Twig Extension

The Twig extension provides the `ansitohtml` tag and filter support.

### Tag

The `ansitohtml` tag allows to convert ANSI escapes to HTML.

```twig
{% ansitohtml %}
Default \e[34mBlue
{% endansitohtml %}
```

### Filter

The `ansitohtml` filter allows to convert ANSI escapes to HTML.

```twig
{{ 'Default \e[34mBlue'|ansitohtml }}
```
