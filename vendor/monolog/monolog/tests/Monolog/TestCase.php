<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array Record
     */
    protected function getRecord($level = Logger::WARNING, $message = 'test', $context = array())
    {
        return array(
            'message' => $message,
            'context' => $context,
            'level' => $level,
            'level_name' => Logger::getLevelName($level),
            'channel' => 'test',
            'datetime' => \DateTime::createFromFormat('U.u', sprintf('%.6F', microtime(true))),
            'extra' => array(),
        );
    }

    /**
     * @return array
     */
    protected function getMultipleRecords()
    {
        return array(
            $this->getRecord(Logger::DEBUG, 'debug message 1'),
            $this->getRecord(Logger::DEBUG, 'debug message 2'),
            $this->getRecord(Logger::INFO, 'information'),
            $this->getRecord(Logger::WARNING, 'warning'),
            $this->getRecord(Logger::ERROR, 'error')
        );
    }

    /**
     * @return Monolog\Formatter\FormatterInterface
     */
    protected function getIdentityFormatter()
    {
        $formatter = $this->getMock('Monolog\\Formatter\\FormatterInterface');
        $formatter->expects($this->any())
            ->method('format')
<<<<<<< HEAD
            ->will($this->returnCallback(function($record) { return $record['message']; }));
=======
            ->will($this->returnCallback(function ($record) { return $record['message']; }));
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7

        return $formatter;
    }
}
