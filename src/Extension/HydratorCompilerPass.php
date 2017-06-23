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

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Vainyl\Core\Exception\MissingRequiredFieldException;
use Vainyl\Core\Exception\MissingRequiredServiceException;

/**
 * Class HydratorCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HydratorCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === ($container->hasDefinition('hydrator.storage'))) {
            throw new MissingRequiredServiceException($container, 'hydrator.storage');
        }

        foreach ($container->findTaggedServiceIds('hydrator') as $id => $tags) {
            foreach ($tags as $attributes) {
                if (false === array_key_exists('alias', $attributes)) {
                    throw new MissingRequiredFieldException($container, $id, $attributes, 'alias');
                }
                $containerDefinition = $container->getDefinition('hydrator.storage');
                $containerDefinition
                    ->addMethodCall('addHydrator', [$attributes['alias'], new Reference($id)]);

                $factoryDefinition = $container->findDefinition($id);
                $factoryDefinition->addMethodCall('addStorage', [new Reference('array.factory.storage')]);
            }
        }

        return $this;
    }
}