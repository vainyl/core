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
namespace Vainyl\Core\Counter;

use Vainyl\Core\Id\AbstractIdentifiable;

/**
 * Class Counter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Counter extends AbstractIdentifiable implements CounterInterface
{
    private $counter = 0;

    /**
     * Counter constructor.
     *
     * @param int $seed
     */
    public function __construct(int $seed = 0)
    {
        $this->counter = $seed;
    }

    /**
     * @inheritDoc
     */
    public function next(): int
    {
        return ++$this->counter;
    }

    /**
     * @inheritDoc
     */
    public function reset(int $seed): CounterInterface
    {
        $this->counter = $seed;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string)$this->counter;
    }
}
