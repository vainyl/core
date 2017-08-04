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

use Vainyl\Core\IdentifiableInterface;

/**
 * Interface QueueInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface QueueInterface extends IdentifiableInterface, \Countable, \Iterator
{
    /**
     * @param IdentifiableInterface $identifiable
     *
     * @return QueueInterface
     */
    public function enqueue(IdentifiableInterface $identifiable) : QueueInterface;

    /**
     * @return null|IdentifiableInterface
     */
    public function dequeue() : ?IdentifiableInterface;

    /**
     * @return null|IdentifiableInterface
     */
    public function peek() : ?IdentifiableInterface;
}