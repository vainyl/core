<?php

namespace Vainyl\Core\Storage\Adapter;

use Ds\Set;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class StorageSetAdapter
 *
 * @author  Andrey Dembitskiy <andrey.dembitskiy@cosmonova.net>
 * Cosmonova LLC
 *
 * @package Vainyl\Core\Storage\Adapter
 */
class StorageSetAdapter extends AbstractIdentifiable implements StorageInterface
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
        throw new \Error('Set data structure does not support checking for element');
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
        throw new \Error('Set data structure does not support unset elements');
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
}
