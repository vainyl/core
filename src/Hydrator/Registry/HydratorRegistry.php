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

namespace Vainyl\Core\Hydrator\Registry;

use Psr\Container\ContainerInterface;
use Vainyl\Core\Exception\UnknownHydratorException;
use Vainyl\Core\Hydrator\HydratorInterface;
use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class HydratorRegistry
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 * @author Andrii Dembitskiy <andrew.dembitskiy@gmail.com>
 */
class HydratorRegistry extends AbstractStorageDecorator implements HydratorRegistryInterface
{
    private $aliasMap         = [];
    private $defaultHydrators = [];

    private $container;

    /**
     * HydratorRegistry constructor.
     *
     * @param StorageInterface   $storage
     * @param ContainerInterface $container
     */
    public function __construct(StorageInterface $storage, ContainerInterface $container)
    {
        $this->container = $container;
        parent::__construct($storage);
    }

    /**
     * @inheritDoc
     */
    public function addHydrator(string $alias, string $containerAlias): HydratorRegistryInterface
    {
        $this->aliasMap[$alias] = $containerAlias;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDefaultHydrator(string $alias, string $containerAlias): HydratorRegistryInterface
    {
        $this->defaultHydrators[] = $alias;
        $this->addHydrator($alias, $containerAlias);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getHydrator(string $alias): HydratorInterface
    {
        if (false === array_key_exists($alias, $this->aliasMap)) {
            return $this->getSupportedDefaultHydrator($alias);
        }

        return $this->getInitializedHydratorOrInitialize($alias, $this->aliasMap[$alias]);
    }

    /**
     * @param string $entityName
     *
     * @return HydratorInterface
     * @throws \Vainyl\Core\Exception\UnknownHydratorException
     */
    private function getSupportedDefaultHydrator(string $entityName): HydratorInterface
    {
        foreach ($this->defaultHydrators as $hydratorAlias) {
            $hydrator = $this->getInitializedHydratorOrInitialize($entityName, $this->aliasMap[$hydratorAlias]);

            if ($hydrator->supports($entityName)) {
                return $hydrator;
            }
        }

        throw new UnknownHydratorException($this, $entityName);
    }

    /**
     * @param string $alias
     * @param string $containerAlias
     *
     * @return HydratorInterface
     */
    private function getInitializedHydratorOrInitialize(string $alias, string $containerAlias): HydratorInterface
    {
        if (false === $this->offsetExists($alias)) {
            $this->offsetSet($alias, $this->container->get($containerAlias));
        }

        return $this->offsetGet($alias);
    }
}
