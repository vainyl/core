<?php

namespace Vainyl\Core\Storage\Adapter;

use Ds\Sequence;
use Vainyl\Core\AbstractArray;
use Vainyl\Core\ReconstructableInterface;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class DsSequenceAdapter
 *
 * @author  Andrey Dembitskiy <andrey.dembitskiy@cosmonova.net>
 * Cosmonova LLC
 *
 * @package Vainyl\Core\Storage\Adapter
 */
class DsSequenceAdapter extends AbstractArray implements StorageInterface
{
    private $sequence;

    /**
     * DsSequenceAdapter constructor.
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
    public function __clone()
    {
        $this->sequence = clone $this->sequence;
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
    public function fromArray(array $data): ReconstructableInterface
    {
        $this->sequence->push(...$data);

        return $this;
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
        if ($offset === null) {
            $this->sequence->push($value);
        } else {
            $this->sequence->set($offset, $value);
        }
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
    public function toArray(): array
    {
        return $this->sequence->toArray();
    }
}
