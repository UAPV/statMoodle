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
use Monolog\Formatter\NormalizerFormatter;

=======
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
/**
 * Formats data into an associative array of scalar values.
 * Objects and arrays will be JSON encoded.
 *
 * @author Andrew Lawson <adlawson@gmail.com>
 */
class ScalarFormatter extends NormalizerFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        foreach ($record as $key => $value) {
            $record[$key] = $this->normalizeValue($value);
        }

        return $record;
    }

    /**
<<<<<<< HEAD
     * @param mixed $value
=======
     * @param  mixed $value
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
     * @return mixed
     */
    protected function normalizeValue($value)
    {
        $normalized = $this->normalize($value);

        if (is_array($normalized) || is_object($normalized)) {
            return $this->toJson($normalized, true);
        }

        return $normalized;
    }
}
