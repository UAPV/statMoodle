<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\MonologBundle;

<<<<<<< HEAD
=======
use Symfony\Bundle\MonologBundle\DependencyInjection\Compiler\AddSwiftMailerTransportPass;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Bundle\MonologBundle\DependencyInjection\Compiler\LoggerChannelPass;
use Symfony\Bundle\MonologBundle\DependencyInjection\Compiler\DebugHandlerPass;
use Symfony\Bundle\MonologBundle\DependencyInjection\Compiler\AddProcessorsPass;

/**
 * Bundle.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class MonologBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass($channelPass = new LoggerChannelPass());
        $container->addCompilerPass(new DebugHandlerPass($channelPass));
        $container->addCompilerPass(new AddProcessorsPass());
<<<<<<< HEAD
=======
        $container->addCompilerPass(new AddSwiftMailerTransportPass());
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }
}
