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
declare(strict_types = 1);
namespace Vainyl\Core\Extension;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Vainyl\Core\Extension\Exception\MissingRequiredFieldException;
use Vainyl\Core\Extension\Exception\MissingRequiredServiceException;

/**
 * Class ComparatorCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ComparatorCompilerPass extends AbstractCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === ($container->hasDefinition('comparator.storage'))) {
            throw new MissingRequiredServiceException($container, 'comparator.storage');
        }

        foreach ($container->findTaggedServiceIds('comparator') as $id => $tags) {
            foreach ($tags as $tag) {
                if (false === array_key_exists('alias', $tag)) {
                    throw new MissingRequiredFieldException($container, $id, $tag, 'alias');
                }
                $alias = $tag['alias'];
                $definition = $container->getDefinition($id);
                $inner = $id . '.inner';
                $container->setDefinition($inner, $definition);

                $containerDefinition = $container->getDefinition('comparator.storage');
                $containerDefinition
                    ->addMethodCall('addComparator', [$alias, new Reference($inner)]);

                $decoratedDefinition = (new Definition())
                    ->setFactory(['comparator.storage', 'getComparator'])
                    ->setArguments($alias);

                $container->setDefinition($id, $decoratedDefinition);
            }
        }

        return $this;
    }
}
