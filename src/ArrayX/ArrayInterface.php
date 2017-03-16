<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\ArrayX;

use Vainyl\Core\Comparator\ComparableInterface;

/**
 * Interface ArrayInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ArrayInterface extends ComparableInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}