<?php

namespace TestSuite\Twig\Extension;

use PHPUnit\Framework\TestCase;
use Twig\Loader\ArrayLoader;
use Twig\Environment;
use Twig\Extension\AnsiToHtmlExtension;

class AnsiToHtmlExtensionTest extends TestCase
{
    public function testParseAnsiToHtml()
    {

        $test = 'Default [34mBlue';

        $loader = new ArrayLoader(['index' => '{{ "' . $test . '"|ansitohtml }}']);
        $twig = new Environment($loader, ['debug' => true, 'cache' => false]);
        $twig->addExtension(new AnsiToHtmlExtension());

        $template = $twig->load('index');
        $this->assertEquals('<span style="font-weight:normal;text-decoration:none;color:White;background-color:Black;">Default </span><span style="font-weight:normal;text-decoration:none;color:Blue;background-color:Black;">Blue</span>', $template->render([]));

        $loader = new ArrayLoader(['index' => '{{ content|ansitohtml }}']);
        $twig = new Environment($loader, ['debug' => true, 'cache' => false]);
        $twig->addExtension(new AnsiToHtmlExtension());

        $template = $twig->load('index');
        $this->assertEquals('<span style="font-weight:normal;text-decoration:none;color:White;background-color:Black;">Default </span><span style="font-weight:normal;text-decoration:none;color:Blue;background-color:Black;">Blue</span>', $template->render(['content' => $test]));
    }
}
