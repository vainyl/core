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

/**
 * Class CoreExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CoreExtension extends AbstractFrameworkExtension
{
    /**
     * @inheritDoc
     */
    public function getCompilerPasses(): array
    {
        return [
            new BootstrapperCompilerPass(),
            new ComparatorCompilerPass(),
            new RendererCompilerPass(),
            new EncoderCompilerPass(),
            new DecoderCompilerPass(),
            new ExtensionCompilerPass(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container): AbstractExtension
    {

        return parent::load($configs, $container);
    }
}
