<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

<<<<<<< HEAD
=======
use Gelf\Message;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
use Monolog\TestCase;
use Monolog\Logger;
use Monolog\Formatter\GelfMessageFormatter;

class GelfHandlerTest extends TestCase
{
    public function setUp()
    {
<<<<<<< HEAD
        if (!class_exists("Gelf\MessagePublisher") || !class_exists("Gelf\Message")) {
            $this->markTestSkipped("mlehner/gelf-php not installed");
        }

        require_once __DIR__ . '/GelfMocks.php';
=======
        if (!class_exists('Gelf\Publisher') || !class_exists('Gelf\Message')) {
            $this->markTestSkipped("graylog2/gelf-php not installed");
        }
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    /**
     * @covers Monolog\Handler\GelfHandler::__construct
     */
    public function testConstruct()
    {
        $handler = new GelfHandler($this->getMessagePublisher());
        $this->assertInstanceOf('Monolog\Handler\GelfHandler', $handler);
    }

    protected function getHandler($messagePublisher)
    {
        $handler = new GelfHandler($messagePublisher);

        return $handler;
    }

    protected function getMessagePublisher()
    {
<<<<<<< HEAD
        return new MockMessagePublisher('localhost');
=======
        return $this->getMock('Gelf\Publisher', array('publish'), array(), '', false);
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    public function testDebug()
    {
<<<<<<< HEAD
        $messagePublisher = $this->getMessagePublisher();
        $handler = $this->getHandler($messagePublisher);

        $record = $this->getRecord(Logger::DEBUG, "A test debug message");
        $handler->handle($record);

        $this->assertEquals(7, $messagePublisher->lastMessage->getLevel());
        $this->assertEquals('test', $messagePublisher->lastMessage->getFacility());
        $this->assertEquals($record['message'], $messagePublisher->lastMessage->getShortMessage());
        $this->assertEquals(null, $messagePublisher->lastMessage->getFullMessage());
=======
        $record = $this->getRecord(Logger::DEBUG, "A test debug message");
        $expectedMessage = new Message();
        $expectedMessage
            ->setLevel(7)
            ->setFacility("test")
            ->setShortMessage($record['message'])
            ->setTimestamp($record['datetime'])
        ;

        $messagePublisher = $this->getMessagePublisher();
        $messagePublisher->expects($this->once())
            ->method('publish')
            ->with($expectedMessage);

        $handler = $this->getHandler($messagePublisher);

        $handler->handle($record);

>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    public function testWarning()
    {
<<<<<<< HEAD
        $messagePublisher = $this->getMessagePublisher();
        $handler = $this->getHandler($messagePublisher);

        $record = $this->getRecord(Logger::WARNING, "A test warning message");
        $handler->handle($record);

        $this->assertEquals(4, $messagePublisher->lastMessage->getLevel());
        $this->assertEquals('test', $messagePublisher->lastMessage->getFacility());
        $this->assertEquals($record['message'], $messagePublisher->lastMessage->getShortMessage());
        $this->assertEquals(null, $messagePublisher->lastMessage->getFullMessage());
=======
        $record = $this->getRecord(Logger::WARNING, "A test warning message");
        $expectedMessage = new Message();
        $expectedMessage
            ->setLevel(4)
            ->setFacility("test")
            ->setShortMessage($record['message'])
            ->setTimestamp($record['datetime'])
        ;

        $messagePublisher = $this->getMessagePublisher();
        $messagePublisher->expects($this->once())
            ->method('publish')
            ->with($expectedMessage);

        $handler = $this->getHandler($messagePublisher);

        $handler->handle($record);
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    public function testInjectedGelfMessageFormatter()
    {
<<<<<<< HEAD
        $messagePublisher = $this->getMessagePublisher();
        $handler = $this->getHandler($messagePublisher);

        $handler->setFormatter(new GelfMessageFormatter('mysystem', 'EXT', 'CTX'));

        $record = $this->getRecord(Logger::WARNING, "A test warning message");
        $record['extra']['blarg'] = 'yep';
        $record['context']['from'] = 'logger';
        $handler->handle($record);

        $this->assertEquals('mysystem', $messagePublisher->lastMessage->getHost());
        $this->assertArrayHasKey('_EXTblarg', $messagePublisher->lastMessage->toArray());
        $this->assertArrayHasKey('_CTXfrom', $messagePublisher->lastMessage->toArray());
=======
        $record = $this->getRecord(Logger::WARNING, "A test warning message");
        $record['extra']['blarg'] = 'yep';
        $record['context']['from'] = 'logger';

        $expectedMessage = new Message();
        $expectedMessage
            ->setLevel(4)
            ->setFacility("test")
            ->setHost("mysystem")
            ->setShortMessage($record['message'])
            ->setTimestamp($record['datetime'])
            ->setAdditional("EXTblarg", 'yep')
            ->setAdditional("CTXfrom", 'logger')
        ;

        $messagePublisher = $this->getMessagePublisher();
        $messagePublisher->expects($this->once())
            ->method('publish')
            ->with($expectedMessage);

        $handler = $this->getHandler($messagePublisher);
        $handler->setFormatter(new GelfMessageFormatter('mysystem', 'EXT', 'CTX'));
        $handler->handle($record);

>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }
}
