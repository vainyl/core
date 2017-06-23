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

namespace Vainyl\Core\Storage\Proxy;

use Ds\Map;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class StorageProxy
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class StorageProxy extends AbstractIdentifiable implements StorageInterface
{
    private $storage;

    /**
     * AbstractStorageDecorator constructor.
     *
     * @param Map $storage
     */
    public function __construct(Map $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return $this->storage->hasKey($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->storage->get($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->storage->put($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        $this->storage->remove($offset);
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return $this->storage->count();
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \IteratorIterator($this->storage);
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
       return $this->storage->toArray();
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $configData) : StorageInterface
    {
        $this->storage->putAll($configData);

        return $this;
    }
}