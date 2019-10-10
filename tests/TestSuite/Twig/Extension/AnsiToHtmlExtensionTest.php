<?php

namespace TestSuite\Twig\Extension;

class AnsiToHtmlExtensionTest extends \PHPUnit\Framework\TestCase
{

    public function testParseAnsiToHtml()
    {

        $sTest = 'Default [34mBlue';

        $oLoader = new \Twig_Loader_Array(array('index' => '{{ "' . $sTest . '"|ansitohtml }}'));
        $oTwig = new \Twig_Environment($oLoader, array('debug' => true, 'cache' => false));
        $oTwig->addExtension(new \Twig\Extension\AnsiToHtmlExtension());

        $oTemplate = $oTwig->loadTemplate('index');
        $this->assertEquals('<span style="font-weight:normal;text-decoration:none;color:White;background-color:Black;">Default </span><span style="font-weight:normal;text-decoration:none;color:Blue;background-color:Black;">Blue</span>', $oTemplate->render(array()));


        $oLoader = new \Twig_Loader_Array(array('index' => '{{ content|ansitohtml }}'));
        $oTwig = new \Twig_Environment($oLoader, array('debug' => true, 'cache' => false));
        $oTwig->addExtension(new \Twig\Extension\AnsiToHtmlExtension());

        $oTemplate = $oTwig->loadTemplate('index');
        $this->assertEquals('<span style="font-weight:normal;text-decoration:none;color:White;background-color:Black;">Default </span><span style="font-weight:normal;text-decoration:none;color:Blue;background-color:Black;">Blue</span>', $oTemplate->render(array('content' => $sTest)));
    }
}
