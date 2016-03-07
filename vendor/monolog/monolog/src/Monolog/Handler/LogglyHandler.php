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

use Monolog\Logger;
<<<<<<< HEAD
use Monolog\Formatter\JsonFormatter;
=======
use Monolog\Formatter\LogglyFormatter;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7

/**
 * Sends errors to Loggly.
 *
 * @author Przemek Sobstel <przemek@sobstel.org>
<<<<<<< HEAD
=======
 * @author Adam Pancutt <adam@pancutt.com>
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
 */
class LogglyHandler extends AbstractProcessingHandler
{
    const HOST = 'logs-01.loggly.com';
<<<<<<< HEAD
=======
    const ENDPOINT_SINGLE = 'inputs';
    const ENDPOINT_BATCH = 'bulk';
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7

    protected $token;

    protected $tag;

    public function __construct($token, $level = Logger::DEBUG, $bubble = true)
    {
        if (!extension_loaded('curl')) {
            throw new \LogicException('The curl extension is needed to use the LogglyHandler');
        }

        $this->token = $token;

        parent::__construct($level, $bubble);
    }

    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    protected function write(array $record)
    {
<<<<<<< HEAD
        $url = sprintf("http://%s/inputs/%s/", self::HOST, $this->token);
        if ($this->tag) {
            $url .= sprintf("tag/%s/", $this->tag);
=======
        $this->send($record["formatted"], self::ENDPOINT_SINGLE);
    }

    public function handleBatch(array $records)
    {
        $level = $this->level;

        $records = array_filter($records, function ($record) use ($level) {
            return ($record['level'] >= $level);
        });

        if ($records) {
            $this->send($this->getFormatter()->formatBatch($records), self::ENDPOINT_BATCH);
        }
    }

    protected function send($data, $endpoint)
    {
        $url = sprintf("https://%s/%s/%s/", self::HOST, $endpoint, $this->token);

        $headers = array('Content-Type: application/json');

        if ($this->tag) {
            $headers[] = "X-LOGGLY-TAG: {$this->tag}";
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
<<<<<<< HEAD
        curl_setopt($ch, CURLOPT_POSTFIELDS, $record["formatted"]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
=======
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);
        curl_close($ch);
    }

    protected function getDefaultFormatter()
    {
<<<<<<< HEAD
        return new JsonFormatter();
=======
        return new LogglyFormatter();
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }
}
