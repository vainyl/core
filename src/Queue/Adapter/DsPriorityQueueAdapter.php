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

namespace Vainyl\Core\Queue\Adapter;

use Ds\PriorityQueue;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\Queue\PriorityQueueInterface;

/**
 * Class DsPriorityQueue
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DsPriorityQueueAdapter extends AbstractIdentifiable implements PriorityQueueInterface
{
    private $queue;

    /**
     * DsPriorityQueueAdapter constructor.
     *
     * @param PriorityQueue $queue
     */
    public function __construct(PriorityQueue $queue)
    {
        $this->queue = $queue;
    }

    /**
     * @inheritDoc
     */
    public function __clone()
    {
        $this->queue = clone $this->queue;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->queue->count();
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->queue->peek();
    }

    /**
     * @inheritDoc
     */
    public function dequeue(): IdentifiableInterface
    {
        return $this->queue->pop();
    }

    /**
     * @inheritDoc
     */
    public function enqueue(IdentifiableInterface $identifiable, int $priority): PriorityQueueInterface
    {
        $this->queue->push($identifiable, $priority);

        return $this;
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
    public function key()
    {
        if (false === $this->valid()) {
            return null;
        }

        return $this->peek()->getId();
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return $this->queue->pop();
    }

    /**
     * @inheritDoc
     */
    public function peek(): ?IdentifiableInterface
    {
        return $this->queue->peek();
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->queue->toArray();
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return false === $this->queue->isEmpty();
    }
}
