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
 * Class AbstractBundleExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractBundleExtension extends Extension implements NameableInterface
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
        return dirname((new \ReflectionClass(get_class($this)))->getFileName()) . DIRECTORY_SEPARATOR . '..';
    }

    /**
     * @return string
     */
    public function getConfigDirectory(): string
    {
        if ($this->environment->isDebugEnabled()) {
            return $this->getDirectory() . DIRECTORY_SEPARATOR . 'config';
        }

        return $this->getDirectory() . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'debug';
    }

    /**
     * @return array
     */
    abstract public function getCompilerPasses(): array;

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container): Extension
    {
        return $this;
    }
}