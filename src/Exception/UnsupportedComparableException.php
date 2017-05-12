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

namespace Vainyl\Core\Exception;

use Vainyl\Core\ComparableInterface;
use Vainyl\Core\Comparator\ComparatorInterface;

/**
 * Class UnsupportedComparableException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedComparableException extends AbstractComparatorException
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
        parent::__construct($comparator, $what, $to, 'Unsupported comparables');
    }
}
