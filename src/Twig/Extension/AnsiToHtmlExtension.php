<?php

namespace Twig\Extension;

class AnsiToHtmlExtension extends \Twig_Extension
{

    /**
     * @var \AnsiEscapesToHtml\Highlighter
     */
    protected $highlighter;

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('ansitohtml', array($this, 'parseAnsiToHtml'), array('is_safe' => array('html'))),
        );
    }

    /**
     * @param string $sContent
     * @return string
     */
    public function parseAnsiToHtml($sContent)
    {
        return $this->getHighlighter()->toHtml($sContent);
    }

    /**
     * @return \AnsiEscapesToHtml\Highlighter
     * @throws \LogicException
     */
    public function getHighlighter()
    {
        if ($this->highlighter === null) {
            $this->setHighlighter(new \AnsiEscapesToHtml\Highlighter());
        }
        if ($this->highlighter instanceof \AnsiEscapesToHtml\Highlighter) {
            return $this->highlighter;
        }
        throw new \LogicException('Property "highlighter" expects an instance of \AnsiEscapesToHtml\Highlighter, "' . (is_object($this->highlighter) ? get_class($this->highlighter) : gettype($this->highlighter)) . '" defined');
    }

    /**
     * @param \AnsiEscapesToHtml\Highlighter $oHighlighter
     * @return \Twig\Extension\AnsiToHtmlExtension
     */
    public function setHighlighter(\AnsiEscapesToHtml\Highlighter $oHighlighter)
    {
        $this->highlighter = $oHighlighter;
        return $this;
    }

    /**
     * @return array
     */
    public function getTokenParsers()
    {
        return array(new \Twig\TokenParser\AnsiToHtmlTokenParser());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ansitohtml';
    }
}
