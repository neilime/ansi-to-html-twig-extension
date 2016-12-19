<?php

namespace TestSuite\Twig\TokenParser;

class AnsiToHtmlTokenParserTest extends \Twig_Test_NodeTestCase
{

    public function testConstructor()
    {

        $aParams = array();
        $sTest = 'Default [34mBlue';

        $oBody = new \Twig_Node(array(new \Twig_Node_Text($sTest, 1)));
        $oNode = new \Twig\Node\AnsiToHtmlNode($aParams, $oBody, 1, 'ansitohtml');

        $this->assertEquals($oBody, $oNode->getNode('body'));
    }

    /**
     * Test that the generated code looks as expected
     *
     * @dataProvider getTests
     */
    public function testCompile($oNode, $source, $environment = null)
    {
        parent::testCompile($oNode, $source, $environment);
    }

    public function getTests()
    {
        $sTest = 'Default [34mBlue';
        $aTests = array();
        $aParams = array(
        );

        $oBody = new \Twig_Node(array(new \Twig_Node_Text($sTest, 1)));
        $oNode = new \Twig\Node\AnsiToHtmlNode($aParams, $oBody, 1, 'ansitohtml');

        $aTests['simple_text'] = array($oNode, '// line 1
ob_start();
echo "' . $sTest . '";
$sSource = rtrim(ob_get_clean());
$oHighlighter = new \AnsiEscapesToHtml\Highlighter();
echo $oHighlighter->toHtml($sSource) . PHP_EOL;');

        $oBody = new \Twig_Node(array(new \Twig_Node_Text($sTest, 1)));
        $oNode = new \Twig\Node\AnsiToHtmlNode($aParams, $oBody, 1, 'ansitohtml');

        $oCompiler = $this->getCompiler(null);
        $oCompiler->compile($oNode);

        $aTests['text_with_leading_indent'] = array($oNode, '// line 1
ob_start();
echo "' . $sTest . '";
$sSource = rtrim(ob_get_clean());
$oHighlighter = new \AnsiEscapesToHtml\Highlighter();
echo $oHighlighter->toHtml($sSource) . PHP_EOL;');

        return $aTests;
    }

    /**
     * @param string $sSource
     * @param \Twig_Node $oNode
     * @param \Twig_Environment $oEnvironment
     * @param boolean $bIsPattern
     * @return void
     */
    public function assertNodeCompilation($sSource, \Twig_Node $oNode, \Twig_Environment $oEnvironment = null, $bIsPattern = false)
    {
        if ($bIsPattern) {
            return parent::assertNodeCompilation($sSource, $oNode, $oEnvironment, $bIsPattern);
        }
        $oCompiler = $this->getCompiler($oEnvironment);
        $oCompiler->compile($oNode);
        $this->assertSame($sSource, trim($oCompiler->getSource()));
    }
}
