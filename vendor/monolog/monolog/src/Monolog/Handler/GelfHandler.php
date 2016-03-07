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

use Gelf\IMessagePublisher;
<<<<<<< HEAD
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
=======
use Gelf\PublisherInterface;
use InvalidArgumentException;
use Monolog\Logger;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
use Monolog\Formatter\GelfMessageFormatter;

/**
 * Handler to send messages to a Graylog2 (http://www.graylog2.org) server
 *
 * @author Matt Lehner <mlehner@gmail.com>
<<<<<<< HEAD
=======
 * @author Benjamin Zikarsky <benjamin@zikarsky.de>
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
 */
class GelfHandler extends AbstractProcessingHandler
{
    /**
<<<<<<< HEAD
     * @var Gelf\IMessagePublisher the publisher object that sends the message to the server
=======
     * @var Publisher the publisher object that sends the message to the server
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
     */
    protected $publisher;

    /**
<<<<<<< HEAD
     * @param Gelf\IMessagePublisher $publisher a publisher object
     * @param integer                $level     The minimum logging level at which this handler will be triggered
     * @param Boolean                $bubble    Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(IMessagePublisher $publisher, $level = Logger::DEBUG, $bubble = true)
    {
        parent::__construct($level, $bubble);

=======
     * @param PublisherInterface|IMessagePublisher $publisher a publisher object
     * @param integer                              $level     The minimum logging level at which this handler will be triggered
     * @param boolean                              $bubble    Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($publisher, $level = Logger::DEBUG, $bubble = true)
    {
        parent::__construct($level, $bubble);

        if (!$publisher instanceof IMessagePublisher && !$publisher instanceof PublisherInterface) {
            throw new InvalidArgumentException("Invalid publisher, expected a Gelf\IMessagePublisher or Gelf\PublisherInterface instance");
        }

>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        $this->publisher = $publisher;
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        $this->publisher = null;
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array $record)
    {
        $this->publisher->publish($record['formatted']);
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter()
    {
        return new GelfMessageFormatter();
    }
}
