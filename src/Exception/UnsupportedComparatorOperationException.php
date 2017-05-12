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
 * Class UnsupportedComparatorOperationException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedComparatorOperationException extends AbstractComparatorException
{
    private $operation;

    /**
     * UnsupportedObjectException constructor.
     *
     * @param ComparatorInterface $comparator
     * @param string              $operation
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     */
    public function __construct(
        ComparatorInterface $comparator,
        string $operation,
        ComparableInterface $what,
        ComparableInterface $to
    ) {
        $this->operation = $operation;
        parent::__construct($comparator, $what, $to, 'Unsupported operation');
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['operation' => $this->operation], parent::toArray());
    }
}