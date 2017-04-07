<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Core\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Vainyl\Core\Extension\Exception\MissingRequiredServiceException;

/**
 * Class BootstrapperCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BootstrapperCompilerPass extends AbstractCompilerPass
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has('bootstrapper.composite')) {
            throw new MissingRequiredServiceException($container, 'bootstrapper.composite');
        }

        $definition = $container->findDefinition('bootstrapper.composite');
        foreach ($container->findTaggedServiceIds('bootstrapper') as $id => $tags) {
            $definition->addMethodCall('addBootstrapper', [new Reference($id)]);
        }

        return $this;
    }
}