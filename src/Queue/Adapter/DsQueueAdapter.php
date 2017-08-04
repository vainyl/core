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

use Ds\Queue;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\Queue\QueueInterface;

/**
 * Class DsQueueAdapter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DsQueueAdapter extends AbstractIdentifiable implements QueueInterface
{
    private $queue;

    /**
     * DsQueueAdapter constructor.
     *
     * @param Queue $queue
     */
    public function __construct(Queue $queue)
    {
        $this->queue = $queue;
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
    public function next()
    {
        return $this->queue->pop();
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
    public function valid()
    {
        return false !== $this->queue->isEmpty();
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
    public function enqueue(IdentifiableInterface $identifiable): QueueInterface
    {
        $this->queue->push($identifiable);

        return $this;
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
    public function peek(): ?IdentifiableInterface
    {
        return $this->queue->peek();
    }
}