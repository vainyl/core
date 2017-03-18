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
namespace Vainyl\Core\Comparator\Exception;

use Vainyl\Core\Comparator\ComparableInterface;
use Vainyl\Core\Comparator\ComparatorInterface;

/**
 * Class UnsupportedObjectException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedObjectException extends AbstractComparatorException
{
    /**
     * UnsupportedObjectException constructor.
     *
     * @param ComparatorInterface $comparator
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     */
    public function __construct(ComparatorInterface $comparator, ComparableInterface $what, ComparableInterface $to)
    {
        parent::__construct($comparator, $what, $to, 'Unsupported objects');
    }
}
