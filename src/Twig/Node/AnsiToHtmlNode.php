<?php

namespace Twig\Node;

/**
 * Represents a AnsiToHtml node, it parses ansi escapes content as html.
 */
class AnsiToHtmlNode extends \Twig_Node
{

    /**
     * Constructor
     * @param array $aParams
     * @param string $sBody
     * @param int $iLine
     * @param string $sTag
     */
    public function __construct($aParams, $sBody, $iLine, $sTag)
    {
        parent::__construct(array('body' => $sBody), $aParams, $iLine, $sTag);
    }

    /**
     * @param \Twig_Compiler $oCompiler
     */
    public function compile(\Twig_Compiler $oCompiler)
    {
        $oCompiler
                ->addDebugInfo($this)
                ->write('ob_start();' . PHP_EOL)
                ->subcompile($this->getNode('body'))
                ->write('$sSource = rtrim(ob_get_clean());' . PHP_EOL)
                ->write('$oHighlighter = new \\AnsiEscapesToHtml\\Highlighter();' . PHP_EOL)
                ->write('echo $oHighlighter->toHtml($sSource) . PHP_EOL;' . PHP_EOL);
    }
}
