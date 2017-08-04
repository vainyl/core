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

namespace Vainyl\Core\Collection\Adapter;

use Ds\Vector;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Collection\VectorInterface;
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\ReconstructableInterface;

/**
 * Class DsVectorAdapter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DsVectorAdapter extends AbstractIdentifiable implements VectorInterface
{
    private $vector;

    /**
     * DsVectorAdapter constructor.
     *
     * @param Vector $vector
     */
    public function __construct(Vector $vector)
    {
        $this->vector = $vector;
    }

    /**
     * @inheritDoc
     */
    public function clear(): VectorInterface
    {
        $this->vector->clear();

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->vector->count();
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): ReconstructableInterface
    {
        $this->vector->clear();
        $this->vector->push($data);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \IteratorIterator($this->vector);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return $this->vector->capacity() <= $offset;
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->vector->get($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->vector->set($offset, $value);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        $this->vector->remove($offset);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function pop(): IdentifiableInterface
    {
        return $this->vector->pop();
    }

    /**
     * @inheritDoc
     */
    public function push(IdentifiableInterface $identifiable): VectorInterface
    {
        $this->vector->push($identifiable);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->vector->toArray();
    }

    /**
     * @inheritDoc
     */
    public function __clone()
    {
        $this->vector = clone $this->vector;
    }
}