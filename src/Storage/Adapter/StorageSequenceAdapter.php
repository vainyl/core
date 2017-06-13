<?php

namespace Vainyl\Core\Storage\Adapter;

use Ds\Sequence;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class StorageSequenceAdapter
 *
 * @author  Andrey Dembitskiy <andrey.dembitskiy@cosmonova.net>
 * Cosmonova LLC
 *
 * @package Vainyl\Core\Storage\Adapter
 */
class StorageSequenceAdapter extends AbstractIdentifiable implements StorageInterface
{
    private $sequence;

    /**
     * StorageSequenceAdapter constructor.
     *
     * @param Sequence $sequence
     */
    public function __construct(Sequence $sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->sequence->toArray();
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \IteratorIterator($this->sequence);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        try {
            return null !== $this->sequence->get($offset);
        } catch (\OutOfRangeException $e) {
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->sequence->get($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->sequence->set($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        $this->sequence->remove($offset);
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->sequence->count();
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $configData): StorageInterface
    {
        $this->sequence->push(...$configData);

        return $this;
    }
}
