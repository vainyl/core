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
 */
class HydratorRegistry extends AbstractStorageDecorator implements HydratorRegistryInterface
{
    private $aliasMap = [];

    private $container;

    /**
     * RendererStorage constructor.
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
    public function addHydrator(string $alias, string $containerAlias): HydratorRegistry
    {
        $this->aliasMap[$alias] = $containerAlias;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRenderer(string $alias): HydratorInterface
    {
        if (false === array_key_exists($alias, $this->aliasMap)) {
            throw new UnknownHydratorException($this, $alias);
        }

        if (false === $this->offsetExists($alias)) {
            $this->offsetSet($alias, $this->container->get($this->aliasMap[$alias]));
        }

        return $this->offsetGet($alias);
    }
}