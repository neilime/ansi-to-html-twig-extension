<?php

namespace Twig\Extension;

use AnsiEscapesToHtml\Highlighter;
use Twig\Extension\AbstractExtension;
use Twig\TokenParser\AnsiToHtmlTokenParser;
use Twig\TwigFilter;

class AnsiToHtmlExtension extends AbstractExtension
{
    /**
     * @var Highlighter
     */
    protected $highlighter;

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('ansitohtml', [$this, 'parseAnsiToHtml'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param string $sContent
     * @return string
     */
    public function parseAnsiToHtml($sContent)
    {
        return $this->getHighlighter()->toHtml($sContent);
    }

    public function getHighlighter(): Highlighter
    {
        if ($this->highlighter === null) {
            $this->setHighlighter(new Highlighter());
        }
        if ($this->highlighter instanceof Highlighter) {
            return $this->highlighter;
        }
    }

    public function setHighlighter(Highlighter $oHighlighter): self
    {
        $this->highlighter = $oHighlighter;
        return $this;
    }

    /**
     * @return array{0: AnsiToHtmlTokenParser}
     */
    public function getTokenParsers(): array
    {
        return [new AnsiToHtmlTokenParser()];
    }

    public function getName(): string
    {
        return 'ansitohtml';
    }
}
