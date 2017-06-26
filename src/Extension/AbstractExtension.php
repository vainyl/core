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
use Symfony\Component\DependencyInjection\Extension\Extension;
use Vainyl\Core\Application\EnvironmentInterface;
use Vainyl\Core\NameableInterface;

/**
 * Class AbstractExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractExtension extends Extension implements NameableInterface
{
    private $environment;

    /**
     * AbstractExtension constructor.
     *
     * @param EnvironmentInterface $environment
     */
    public function __construct(EnvironmentInterface $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return EnvironmentInterface
     */
    public function getEnvironment(): EnvironmentInterface
    {
        return $this->environment;
    }

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
     * @inheritDoc
     */
    public function getNamespace()
    {
        return str_replace('\Extension', '', (new \ReflectionClass($this))->getNamespaceName());
    }


    /**
     * @return string
     */
    abstract public function getDirectory(): string;

    /**
     * @return string
     */
    abstract public function getConfigDirectory(): string;

    /**
     * @return array
     */
    public function getCompilerPasses(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container): AbstractExtension
    {
        (new \Symfony\Component\DependencyInjection\Loader\YamlFileLoader(
            $container,
            new \Symfony\Component\Config\FileLocator(
                $this->getConfigDirectory()
            )
        ))
            ->load('services.yml');

        return $this;
    }
}
