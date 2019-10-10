## Table of contents

- [\Twig\Extension\AnsiToHtmlExtension](#class-twigextensionansitohtmlextension)
- [\Twig\Node\AnsiToHtmlNode](#class-twignodeansitohtmlnode)
- [\Twig\TokenParser\AnsiToHtmlTokenParser](#class-twigtokenparseransitohtmltokenparser)

<hr />

### Class: \Twig\Extension\AnsiToHtmlExtension

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getFilters()</strong> : <em>array</em> |
| public | <strong>getHighlighter()</strong> : <em>\AnsiEscapesToHtml\Highlighter</em> |
| public | <strong>getName()</strong> : <em>string</em> |
| public | <strong>getTokenParsers()</strong> : <em>array</em> |
| public | <strong>parseAnsiToHtml(</strong><em>string</em> <strong>$sContent</strong>)</strong> : <em>string</em> |
| public | <strong>setHighlighter(</strong><em>\AnsiEscapesToHtml\Highlighter</em> <strong>$oHighlighter</strong>)</strong> : <em>[\Twig\Extension\AnsiToHtmlExtension](#class-twigextensionansitohtmlextension)</em> |

*This class extends \Twig\Extension\AbstractExtension*

*This class implements \Twig\Extension\ExtensionInterface*

<hr />

### Class: \Twig\Node\AnsiToHtmlNode

> Represents a AnsiToHtml node, it parses ansi escapes content as html.

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>array</em> <strong>$aParams</strong>, <em>string</em> <strong>$sBody</strong>, <em>int</em> <strong>$iLine</strong>, <em>string</em> <strong>$sTag</strong>)</strong> : <em>void</em><br /><em>Constructor</em> |
| public | <strong>compile(</strong><em>\Twig_Compiler</em> <strong>$oCompiler</strong>)</strong> : <em>void</em> |

*This class extends \Twig\Node\Node*

*This class implements \Traversable, \IteratorAggregate, \Countable*

<hr />

### Class: \Twig\TokenParser\AnsiToHtmlTokenParser

| Visibility | Function |
|:-----------|:---------|
| public | <strong>decideBlockEnd(</strong><em>\Twig_Token</em> <strong>$oToken</strong>)</strong> : <em>void</em> |
| public | <strong>getTag()</strong> : <em>string</em><br /><em>Gets the tag name associated with this token parser.</em> |
| public | <strong>parse(</strong><em>\Twig_Token</em> <strong>$oToken</strong>)</strong> : <em>[\Twig\Node\AnsiToHtmlNode](#class-twignodeansitohtmlnode)</em> |

*This class extends \Twig\TokenParser\AbstractTokenParser*

*This class implements \Twig\TokenParser\TokenParserInterface*

