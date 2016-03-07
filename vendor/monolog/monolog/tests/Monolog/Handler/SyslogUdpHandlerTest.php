<?php

namespace Monolog\Handler;

<<<<<<< HEAD
use Monolog\TestCase;

=======
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
class SyslogUdpHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException UnexpectedValueException
     */
    public function testWeValidateFacilities()
    {
        $handler = new SyslogUdpHandler("ip", null, "invalidFacility");
    }

    public function testWeSplitIntoLines()
    {
<<<<<<< HEAD
        $handler = new SyslogUdpHandler("127.0.0.1", 514, "local5");
=======
        $handler = new SyslogUdpHandler("127.0.0.1", 514, "authpriv");
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        $handler->setFormatter(new \Monolog\Formatter\ChromePHPFormatter());

        $socket = $this->getMock('\Monolog\Handler\SyslogUdp\UdpSocket', array('write'), array('lol', 'lol'));
        $socket->expects($this->at(0))
            ->method('write')
<<<<<<< HEAD
            ->with("lol", "<172>: ");
        $socket->expects($this->at(1))
            ->method('write')
            ->with("hej", "<172>: ");
=======
            ->with("lol", "<".(LOG_AUTHPRIV + LOG_WARNING).">: ");
        $socket->expects($this->at(1))
            ->method('write')
            ->with("hej", "<".(LOG_AUTHPRIV + LOG_WARNING).">: ");
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7

        $handler->setSocket($socket);

        $handler->handle($this->getRecordWithMessage("hej\nlol"));
    }

    protected function getRecordWithMessage($msg)
    {
        return array('message' => $msg, 'level' => \Monolog\Logger::WARNING, 'context' => null, 'extra' => array(), 'channel' => 'lol');
    }
}
