<?php

namespace Twig\Node;

use InvalidArgumentException;
use Twig\Node\Node;
use Twig\Compiler;

/**
 * Represents a AnsiToHtml node, it parses ansi escapes content as html.
 */
class AnsiToHtmlNode extends Node
{
    /**
     * @param array{} $attributes
     */
    public function __construct(array $attributes, Node $body, int $lineno)
    {
        parent::__construct(
            nodes: ['body' => $body],
            attributes: $attributes,
            lineno: $lineno,
        );
    }

    public function compile(Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('ob_start();' . PHP_EOL)
            ->subcompile($this->getNode('body'))
            ->write('echo (new \\AnsiEscapesToHtml\\Highlighter())->toHtml(rtrim(ob_get_clean())) . PHP_EOL;' . PHP_EOL);
    }
}
