<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Stat\EnseignantBundle\StatEnseignantBundle(),
            new Dosi\AuthBundle\DosiAuthBundle(),
<<<<<<< HEAD
	    //new Dosi\AppigBundle\DosiAppigBundle(),
=======
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
<<<<<<< HEAD
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
=======
        //$loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
        $loader->load(__DIR__.'/config/config.yml');
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }
}
