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

namespace Vainyl\Core\Queue;

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Interface PriorityQueueInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface PriorityQueueInterface extends ArrayInterface, \Countable, \Iterator
{
    /**
     * @return null|IdentifiableInterface
     */
    public function dequeue(): ?IdentifiableInterface;

    /**
     * @param IdentifiableInterface $identifiable
     * @param int                   $priority
     *
     * @return PriorityQueueInterface
     */
    public function enqueue(IdentifiableInterface $identifiable, int $priority): PriorityQueueInterface;

    /**
     * @return null|IdentifiableInterface
     */
    public function peek(): ?IdentifiableInterface;
}