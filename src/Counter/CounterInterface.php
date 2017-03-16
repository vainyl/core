<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\Counter;

use Vainyl\Core\String\StringInterface;

/**
 * Interface CounterInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CounterInterface extends StringInterface
{
    /**
     * @param int $seed
     *
     * @return CounterInterface
     */
    public function reset(int $seed) : CounterInterface;

    /**
     * @return int
     */
    public function next() : int;
}
