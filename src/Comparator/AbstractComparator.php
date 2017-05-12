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

namespace Vainyl\Core\Comparator;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\ComparableInterface;
use Vainyl\Core\Exception\UnsupportedComparatorOperationException;

/**
 * Class AbstractComparator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractComparator extends AbstractIdentifiable implements ComparatorInterface
{
    /**
     * @param string              $operation
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    abstract public function supports(string $operation, ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    abstract public function doEq(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    abstract public function doNeq(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    abstract public function doLt(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    abstract public function doGt(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    abstract public function doLte(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    abstract public function doGte(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    abstract public function doLike(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @inheritDoc
     */
    public function eq(ComparableInterface $what, ComparableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_EQUAL, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_EQUAL, $what, $to);
        }

        return $this->doEq($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function neq(ComparableInterface $what, ComparableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_NOT_EQUAL, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_NOT_EQUAL, $what, $to);
        }

        return $this->doNeq($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function lt(ComparableInterface $what, ComparableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_LESS, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_LESS, $what, $to);
        }

        return $this->doLt($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function gt(ComparableInterface $what, ComparableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_GREATER, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_GREATER, $what, $to);
        }

        return $this->doGt($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function lte(ComparableInterface $what, ComparableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_LESS_OR_EQUAL, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_LESS_OR_EQUAL, $what, $to);
        }

        return $this->doLte($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function gte(ComparableInterface $what, ComparableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_GREATER_OR_EQUAL, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_GREATER_OR_EQUAL, $what, $to);
        }

        return $this->doGte($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function like(ComparableInterface $what, ComparableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_LIKE, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_LIKE, $what, $to);
        }

        return $this->doLike($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function compare(ComparableInterface $what, ComparableInterface $to): int
    {
        if ($this->lt($what, $to)) {
            return self::RESULT_LESS;
        }

        if ($this->gt($what, $to)) {
            return self::RESULT_GREATER;
        }

        return self::RESULT_EQUAL;
    }
}
