<?php

namespace Twig\TokenParser;

class AnsiToHtmlTokenParser extends \Twig_TokenParser
{

    /**
     * @param \Twig_Token $oToken
     * @return \Twig\Node\AnsiToHtmlNode
     * @throws \Twig_Error_Syntax
     */
    public function parse(\Twig_Token $oToken)
    {
        $aParams = array();

        $iLine = $oToken->getLine();
        $oStream = $this->parser->getStream();

        $oStream->expect(\Twig_Token::BLOCK_END_TYPE);
        $sBody = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
        $oStream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new \Twig\Node\AnsiToHtmlNode($aParams, $sBody, $iLine, $this->getTag());
    }

    public function decideBlockEnd(\Twig_Token $oToken)
    {
        return $oToken->test('endansitohtml');
    }

    /**
     * Gets the tag name associated with this token parser.
     * @return string
     */
    public function getTag()
    {
        return 'ansitohtml';
    }
}
