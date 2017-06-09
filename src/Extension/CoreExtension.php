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
use Vainyl\Core\Application\EnvironmentInterface;

/**
 * Class CoreExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CoreExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function load(
        array $configs,
        ContainerBuilder $container,
        EnvironmentInterface $environment = null
    ): AbstractExtension {
        $container
            ->addCompilerPass(new BootstrapperCompilerPass())
            ->addCompilerPass(new ComparatorCompilerPass())
            ->addCompilerPass(new RendererCompilerPass())
            ->addCompilerPass(new EncoderCompilerPass())
            ->addCompilerPass(new DecoderCompilerPass())
            ->addCompilerPass(new ExtensionCompilerPass());

        return parent::load($configs, $container, $environment);
    }
}
