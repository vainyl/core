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
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Vainyl\Core\Exception\MissingRequiredFieldException;
use Vainyl\Core\Exception\MissingRequiredServiceException;

/**
 * Class RendererCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RendererCompilerPass extends AbstractCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === ($container->hasDefinition('renderer.storage'))) {
            throw new MissingRequiredServiceException($container, 'renderer.storage');
        }

        foreach ($container->findTaggedServiceIds('renderer') as $id => $tags) {
            foreach ($tags as $attributes) {
                if (false === array_key_exists('alias', $attributes)) {
                    throw new MissingRequiredFieldException($container, $id, $attributes, 'alias');
                }
                $alias = $attributes['alias'];
                $definition = $container->getDefinition($id);
                $inner = $id . '.inner';
                $container->setDefinition($inner, $definition);

                $containerDefinition = $container->getDefinition('renderer.storage');
                $containerDefinition
                    ->addMethodCall('addRenderer', [$alias, new Reference($inner)]);

                $decoratedDefinition = (new Definition())
                    ->setFactory(['renderer.storage', 'getRenderer'])
                    ->setArguments($alias);

                $container->setDefinition($id, $decoratedDefinition);
            }
        }

        return $this;
    }
}
