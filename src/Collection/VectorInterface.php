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

namespace Vainyl\Core\Collection;

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\ReconstructableInterface;

/**
 * Interface VectorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface VectorInterface extends ArrayInterface, ReconstructableInterface, \IteratorAggregate, \ArrayAccess, \Countable
{
    /**
     * @return VectorInterface
     */
    public function clear(): VectorInterface;

    /**
     * @return IdentifiableInterface
     */
    public function pop(): IdentifiableInterface;

    /**
     * @param IdentifiableInterface $identifiable
     *
     * @return VectorInterface
     */
    public function push(IdentifiableInterface $identifiable): VectorInterface;
}