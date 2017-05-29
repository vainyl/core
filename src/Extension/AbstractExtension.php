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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Vainyl\Core\Application\EnvironmentInterface;
use Vainyl\Core\NameableInterface;

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
        return strtolower(str_replace('Extension', '', (new \ReflectionClass($this))->getShortName()));
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return sprintf(
            '%s%s..%s..',
            dirname((new \ReflectionClass(get_class($this)))->getFileName()),
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR
        );
    }

    /**
     * @return string
     */
    public function getConfigDirectory() : string
    {
        return 'config';
    }

    /**
     * @return string
     */
    public function getDebugDirectory() : string
    {
        return 'debug';
    }

    /**
     * @inheritDoc
     */
    public function load(
        array $configs,
        ContainerBuilder $container,
        EnvironmentInterface $environment = null
    ): AbstractExtension {
        $container->addCompilerPass(new ExtensionCompilerPass());

        $diFile = 'di.yml';
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(
                sprintf(
                    '%s%s%s%s',
                    $this->getDirectory(),
                    DIRECTORY_SEPARATOR,
                    $this->getConfigDirectory(),
                    DIRECTORY_SEPARATOR
                )
            )
        );
        if ($environment->isDebugEnabled()) {
            $path = $this->getDebugDirectory() . DIRECTORY_SEPARATOR . $diFile;
        } else {
            $path = $diFile;
        }
        $loader->load($path);

        $container->setDefinition(
            sprintf('extensions.%s', $this->getName()),
            (new Definition(get_class($this)))->addTag('extension')
        );

        return $this;
    }
}
