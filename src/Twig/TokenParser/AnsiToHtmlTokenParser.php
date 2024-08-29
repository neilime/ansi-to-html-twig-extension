<?php

namespace Twig\TokenParser;

use Twig\Node\AnsiToHtmlNode;
use Twig\TokenParser\AbstractTokenParser;
use Twig\Token;

class AnsiToHtmlTokenParser extends AbstractTokenParser
{
    public function parse(Token $token)
    {
        $attributes = [];

        $line = $token->getLine();
        $stream = $this->parser->getStream();

        $stream->expect(Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse([$this, 'decideBlockEnd'], true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new AnsiToHtmlNode(
            attributes: $attributes,
            body: $body,
            lineno: $line,
        );
    }

    public function decideBlockEnd(Token $token): bool
    {
        return $token->test('endansitohtml');
    }

    /**
     * Gets the tag name associated with this token parser.
     */
    public function getTag(): string
    {
        return 'ansitohtml';
    }
}
