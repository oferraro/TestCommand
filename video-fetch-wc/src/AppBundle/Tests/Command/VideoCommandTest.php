<?php

namespace AppBundle\Tests\Command;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use AppBundle\Command\VideoCommand as VideoCommand;

class VideoCommandTest extends WebTestCase
{
    public function testIndex()
    {
        $tester = new CommandTester (new VideoCommand('php app/console App:VideoCommand'));
        $res = $tester->execute (array('-d' => '../feed-exportss', '-S' => 'glorf'));
        $this->assertEquals($tester->getDisplay(), "/var/www/html/cmp/video-fetch-wc/../feed-exportss/glorf.json doesn't exist!\n");
        
        $res = $tester->execute (array('-d' => '../feed-exports', '-S' => 'flub'));

        $expected= "saved OK\n";
        $this->assertEquals ($expected, $tester->getDisplay());
    }
}

