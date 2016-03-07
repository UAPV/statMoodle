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

use Aws\Common\Aws;
use Aws\DynamoDb\DynamoDbClient;
use Monolog\Formatter\ScalarFormatter;
<<<<<<< HEAD
use Monolog\Handler\AbstractProcessingHandler;
=======
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
use Monolog\Logger;

/**
 * Amazon DynamoDB handler (http://aws.amazon.com/dynamodb/)
 *
 * @link https://github.com/aws/aws-sdk-php/
 * @author Andrew Lawson <adlawson@gmail.com>
 */
class DynamoDbHandler extends AbstractProcessingHandler
{
    const DATE_FORMAT = 'Y-m-d\TH:i:s.uO';

    /**
     * @var DynamoDbClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $table;

    /**
     * @param DynamoDbClient $client
<<<<<<< HEAD
     * @param string $table
     * @param integer $level
     * @param boolean $bubble
=======
     * @param string         $table
     * @param integer        $level
     * @param boolean        $bubble
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
     */
    public function __construct(DynamoDbClient $client, $table, $level = Logger::DEBUG, $bubble = true)
    {
        if (!defined('Aws\Common\Aws::VERSION') || version_compare('3.0', Aws::VERSION, '<=')) {
            throw new \RuntimeException('The DynamoDbHandler is only known to work with the AWS SDK 2.x releases');
        }

        $this->client = $client;
        $this->table = $table;

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array $record)
    {
        $filtered = $this->filterEmptyFields($record['formatted']);
        $formatted = $this->client->formatAttributes($filtered);

        $this->client->putItem(array(
            'TableName' => $this->table,
            'Item' => $formatted
        ));
    }

    /**
<<<<<<< HEAD
     * @param array $record
=======
     * @param  array $record
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
     * @return array
     */
    protected function filterEmptyFields(array $record)
    {
<<<<<<< HEAD
        return array_filter($record, function($value) {
=======
        return array_filter($record, function ($value) {
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
            return !empty($value) || false === $value || 0 === $value;
        });
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultFormatter()
    {
        return new ScalarFormatter(self::DATE_FORMAT);
    }
}
