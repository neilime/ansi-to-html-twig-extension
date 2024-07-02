<?php

namespace TestSuite\Twig\TokenParser;

use Twig\Node\AnsiToHtmlNode;
use Twig\Node\Node;
use Twig\Node\TextNode;
use Twig\Test\NodeTestCase;

class AnsiToHtmlTokenParserTest extends NodeTestCase
{
    public function testConstructor()
    {

        $attributes = [];

        $test = 'Default [34mBlue';
        $body = new Node([new TextNode($test, 1)]);
        $node = new AnsiToHtmlNode(
            attributes: $attributes,
            body: $body,
            lineno: 1,
        );

        $this->assertEquals($body, $node->getNode('body'));
    }

    public function getTests()
    {
        $attributes = [];

        $test = 'Default [34mBlue';
        $body = new Node([new TextNode($test, 1)]);
        $node = new AnsiToHtmlNode(
            attributes: $attributes,
            body: $body,
            lineno: 1,
        );


        $tests['simple_text'] = [
            $node,
            '// line 1
ob_start();
yield "' . $test . '";
echo (new \AnsiEscapesToHtml\Highlighter())->toHtml(rtrim(ob_get_clean())) . PHP_EOL;',
        ];

        $body = new Node([new TextNode($test, 1)]);
        $node = new AnsiToHtmlNode(
            attributes: $attributes,
            body: $body,
            lineno: 1,
        );

        $compiler = $this->getCompiler(null);
        $compiler->compile($node);

        $tests['text_with_leading_indent'] = [
            $node,
            '// line 1
ob_start();
yield "' . $test . '";
echo (new \AnsiEscapesToHtml\Highlighter())->toHtml(rtrim(ob_get_clean())) . PHP_EOL;',
        ];

        return $tests;
    }
}
