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
declare(strict_types = 1);

namespace Vainyl\Core\Storage\Proxy;

use Vainyl\Core\Storage\StorageInterface;

/**
 * Class AbstractStorageProxy
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractStorageProxy implements StorageInterface
{
    private $storage;

    /**
     * AbstractStorageDecorator constructor.
     *
     * @param StorageInterface $storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->storage->count();
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->storage->next();
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->storage->key();
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return $this->storage->valid();
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->storage->rewind();
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return $this->storage->offsetExists($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->storage->offsetGet($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->storage->offsetSet($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        $this->storage->offsetUnset($offset);
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->storage->getId();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->storage->getName();
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->storage->count();
    }
}