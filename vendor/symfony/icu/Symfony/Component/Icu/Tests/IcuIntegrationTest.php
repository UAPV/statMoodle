<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Icu\Tests;

use Symfony\Component\Icu\IcuCurrencyBundle;
use Symfony\Component\Icu\IcuLanguageBundle;
use Symfony\Component\Icu\IcuLocaleBundle;
use Symfony\Component\Icu\IcuRegionBundle;
use Symfony\Component\Intl\ResourceBundle\Reader\BinaryBundleReader;
use Symfony\Component\Intl\ResourceBundle\Reader\StructuredBundleReader;

/**
 * Verifies that the binary data files can actually be read.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class IcuIntegrationTest extends IcuTestCase
{
    public function testCurrencyBundle()
    {
        $bundle = new IcuCurrencyBundle(new StructuredBundleReader(new BinaryBundleReader()));

        $this->assertSame('€', $bundle->getCurrencySymbol('EUR'));
<<<<<<< HEAD
=======
        $this->assertContains('en_GB', $bundle->getLocales());
        $this->assertContains('mo', $bundle->getLocales());
        $this->assertContains('ro_MD', $bundle->getLocales());
        $this->assertNotContains('root', $bundle->getLocales());
        $this->assertNotContains('supplementalData', $bundle->getLocales());
        $this->assertNotContains('supplementaldata', $bundle->getLocales());
        $this->assertNotContains('misc', $bundle->getLocales());
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    public function testLanguageBundle()
    {
        $bundle = new IcuLanguageBundle(new StructuredBundleReader(new BinaryBundleReader()));

        $this->assertSame('German', $bundle->getLanguageName('de', null, 'en'));
<<<<<<< HEAD
=======
        $this->assertContains('en_GB', $bundle->getLocales());
        $this->assertContains('mo', $bundle->getLocales());
        $this->assertContains('ro_MD', $bundle->getLocales());
        $this->assertNotContains('root', $bundle->getLocales());
        $this->assertNotContains('supplementalData', $bundle->getLocales());
        $this->assertNotContains('supplementaldata', $bundle->getLocales());
        $this->assertNotContains('misc', $bundle->getLocales());
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    public function testLocaleBundle()
    {
        $bundle = new IcuLocaleBundle(new StructuredBundleReader(new BinaryBundleReader()));

        $this->assertSame('azéri', $bundle->getLocaleName('az', 'fr'));
<<<<<<< HEAD
=======
        $this->assertContains('en_GB', $bundle->getLocales());
        $this->assertContains('mo', $bundle->getLocales());
        $this->assertContains('ro_MD', $bundle->getLocales());
        $this->assertNotContains('root', $bundle->getLocales());
        $this->assertNotContains('supplementalData', $bundle->getLocales());
        $this->assertNotContains('supplementaldata', $bundle->getLocales());
        $this->assertNotContains('misc', $bundle->getLocales());
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    public function testRegionBundle()
    {
        $bundle = new IcuRegionBundle(new StructuredBundleReader(new BinaryBundleReader()));

        $this->assertSame('Vereinigtes Königreich', $bundle->getCountryName('GB', 'de'));
<<<<<<< HEAD
=======
        $this->assertContains('en_GB', $bundle->getLocales());
        $this->assertContains('mo', $bundle->getLocales());
        $this->assertContains('ro_MD', $bundle->getLocales());
        $this->assertNotContains('root', $bundle->getLocales());
        $this->assertNotContains('supplementalData', $bundle->getLocales());
        $this->assertNotContains('supplementaldata', $bundle->getLocales());
        $this->assertNotContains('misc', $bundle->getLocales());
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }
}
