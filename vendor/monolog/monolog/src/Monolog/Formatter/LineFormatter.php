<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Formatter;

<<<<<<< HEAD
=======
use Exception;

>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
/**
 * Formats incoming records into a one-line string
 *
 * This is especially useful for logging to files
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Christophe Coevoet <stof@notk.org>
 */
class LineFormatter extends NormalizerFormatter
{
    const SIMPLE_FORMAT = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";

    protected $format;
<<<<<<< HEAD

    /**
     * @param string $format     The format of the message
     * @param string $dateFormat The format of the timestamp: one supported by DateTime::format
     */
    public function __construct($format = null, $dateFormat = null)
    {
        $this->format = $format ?: static::SIMPLE_FORMAT;
=======
    protected $allowInlineLineBreaks;

    /**
     * @param string $format                The format of the message
     * @param string $dateFormat            The format of the timestamp: one supported by DateTime::format
     * @param bool   $allowInlineLineBreaks Whether to allow inline line breaks in log entries
     */
    public function __construct($format = null, $dateFormat = null, $allowInlineLineBreaks = false)
    {
        $this->format = $format ?: static::SIMPLE_FORMAT;
        $this->allowInlineLineBreaks = $allowInlineLineBreaks;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        parent::__construct($dateFormat);
    }

    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        $vars = parent::format($record);

        $output = $this->format;
        foreach ($vars['extra'] as $var => $val) {
            if (false !== strpos($output, '%extra.'.$var.'%')) {
<<<<<<< HEAD
                $output = str_replace('%extra.'.$var.'%', $this->convertToString($val), $output);
=======
                $output = str_replace('%extra.'.$var.'%', $this->replaceNewlines($this->convertToString($val)), $output);
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
                unset($vars['extra'][$var]);
            }
        }
        foreach ($vars as $var => $val) {
            if (false !== strpos($output, '%'.$var.'%')) {
<<<<<<< HEAD
                $output = str_replace('%'.$var.'%', $this->convertToString($val), $output);
=======
                $output = str_replace('%'.$var.'%', $this->replaceNewlines($this->convertToString($val)), $output);
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
            }
        }

        return $output;
    }

    public function formatBatch(array $records)
    {
        $message = '';
        foreach ($records as $record) {
            $message .= $this->format($record);
        }

        return $message;
    }

<<<<<<< HEAD
    protected function normalize($data)
    {
        if (is_bool($data) || is_null($data)) {
            return var_export($data, true);
        }

        if ($data instanceof \Exception) {
            $previousText = '';
            if ($previous = $data->getPrevious()) {
                do {
                    $previousText .= ', '.get_class($previous).': '.$previous->getMessage().' at '.$previous->getFile().':'.$previous->getLine();
                } while ($previous = $previous->getPrevious());
            }

            return '[object] ('.get_class($data).': '.$data->getMessage().' at '.$data->getFile().':'.$data->getLine().$previousText.')';
        }

        return parent::normalize($data);
=======
    protected function normalizeException(Exception $e)
    {
        $previousText = '';
        if ($previous = $e->getPrevious()) {
            do {
                $previousText .= ', '.get_class($previous).': '.$previous->getMessage().' at '.$previous->getFile().':'.$previous->getLine();
            } while ($previous = $previous->getPrevious());
        }

        return '[object] ('.get_class($e).': '.$e->getMessage().' at '.$e->getFile().':'.$e->getLine().$previousText.')';
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    protected function convertToString($data)
    {
<<<<<<< HEAD
        if (null === $data || is_scalar($data)) {
            return (string) $data;
        }

        $data = $this->normalize($data);
=======
        if (null === $data || is_bool($data)) {
            return var_export($data, true);
        }

        if (is_scalar($data)) {
            return (string) $data;
        }

>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            return $this->toJson($data, true);
        }

        return str_replace('\\/', '/', @json_encode($data));
    }
<<<<<<< HEAD
=======

    protected function replaceNewlines($str)
    {
        if ($this->allowInlineLineBreaks) {
            return $str;
        }

        return preg_replace('{[\r\n]+}', ' ', $str);
    }
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
}
