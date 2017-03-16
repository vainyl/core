<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\Extension;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Vainyl\Core\Name\NameableInterface;

/**
 * Class AbstractExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractExtension extends Extension implements NameableInterface
{
    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return spl_object_hash($this);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return basename(get_class($this));
    }

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container): AbstractExtension
    {
        $diFile = 'di.yml';
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(
                sprintf(
                    '%s%s..%s..%s%s',
                    dirname((new \ReflectionClass(get_class($this)))->getFileName()),
                    DIRECTORY_SEPARATOR,
                    DIRECTORY_SEPARATOR,
                    DIRECTORY_SEPARATOR,
                    $container->getParameter('config.dir')
                )
            )
        );
        if ($container->hasParameter('app.debug') && $container->getParameter('app.debug')) {
            $path = 'debug' . DIRECTORY_SEPARATOR . $diFile;
        } else {
            $path = $diFile;
        }
        $loader->load($path);

        return $this;
    }
}