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
use Vainyl\Core\Exception\MissingRequiredFieldException;
use Vainyl\Core\Exception\MissingRequiredServiceException;

/**
 * Class HydratorCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 * @author Andrii Dembitskiy <andrew.dembitskiy@gmail.com>
 */
class HydratorCompilerPass extends AbstractCompilerPass
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === ($container->hasDefinition('hydrator.registry'))) {
            throw new MissingRequiredServiceException($container, 'hydrator.registry');
        }

        $containerDefinition = $container->getDefinition('hydrator.registry');
        foreach ($container->findTaggedServiceIds('hydrator') as $id => $tags) {
            foreach ($tags as $attributes) {
                if (false === array_key_exists('alias', $attributes)) {
                    throw new MissingRequiredFieldException($container, $id, $attributes, 'alias');
                }

                $isDefault = $attributes['default'] ?? false;

                $method = $isDefault
                    ? 'addDefaultHydrator'
                    : 'addHydrator';

                $containerDefinition
                    ->addMethodCall($method, [$attributes['alias'], $id]);
            }
        }

        return $this;
    }
}
