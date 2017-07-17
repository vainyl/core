<?php

namespace Vainyl\Core\Storage\Adapter;

use Ds\Set;
use Vainyl\Core\AbstractArray;
use Vainyl\Core\Exception\UnsupportedMethodStorageException;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class StorageSetAdapter
 *
 * @author  Andrey Dembitskiy <andrey.dembitskiy@cosmonova.net>
 * Cosmonova LLC
 *
 * @package Vainyl\Core\Storage\Adapter
 */
class StorageSetAdapter extends AbstractArray implements StorageInterface
{
    private $set;

    /**
     * StorageSetAdapter constructor.
     *
     * @param Set $set
     */
    public function __construct(Set $set)
    {
        $this->set = $set;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->set->toArray();
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \IteratorIterator($this->set);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        throw new UnsupportedMethodStorageException($this, __METHOD__);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->set->offsetGet($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->set->add($value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        throw new UnsupportedMethodStorageException($this, __METHOD__);
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->set->count();
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $configData): StorageInterface
    {
        $this->set->add(...$configData);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function __clone()
    {
        $this->set = clone $this->set;
    }
}
