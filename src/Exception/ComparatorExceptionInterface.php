<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Core\Exception;

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\Comparator\ComparatorInterface;

/**
 * Interface ComparatorExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ComparatorExceptionInterface extends ArrayInterface, \Throwable
{
    /**
     * @return ComparatorInterface
     */
    public function getComparator(): ComparatorInterface;
}
