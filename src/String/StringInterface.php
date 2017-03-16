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
namespace Vainyl\Core\String;

use Vainyl\Core\Comparator\ComparableInterface;

/**
 * Interface StringInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface StringInterface extends ComparableInterface
{
    /**
     * @return string
     */
    public function __toString() : string;
}
