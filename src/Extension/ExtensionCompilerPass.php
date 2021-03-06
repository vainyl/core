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
use Vainyl\Core\Exception\MissingRequiredServiceException;

/**
 * Class ExtensionCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ExtensionCompilerPass extends AbstractCompilerPass
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === ($container->hasDefinition('extension.storage'))) {
            throw new MissingRequiredServiceException($container, 'extension.storage');
        }

        $containerDefinition = $container->getDefinition('extension.storage');
        foreach ($container->findTaggedServiceIds('extension') as $id => $tags) {
            $containerDefinition
                ->addMethodCall('addExtension', [new Reference($id)]);
        }

        return $this;
    }
}