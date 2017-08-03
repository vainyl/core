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
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\Exception\UnsupportedComparatorOperationException;

/**
 * Class AbstractComparator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractComparator extends AbstractIdentifiable implements ComparatorInterface
{
    /**
     * @param string                $operation
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    abstract public function supports(string $operation, IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    abstract public function doEq(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    abstract public function doNeq(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    abstract public function doLt(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    abstract public function doGt(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    abstract public function doLte(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    abstract public function doGte(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    abstract public function doLike(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @inheritDoc
     */
    public function eq(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_EQUAL, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_EQUAL, $what, $to);
        }

        return $this->doEq($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function neq(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_NOT_EQUAL, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_NOT_EQUAL, $what, $to);
        }

        return $this->doNeq($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function lt(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_LESS, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_LESS, $what, $to);
        }

        return $this->doLt($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function gt(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_GREATER, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_GREATER, $what, $to);
        }

        return $this->doGt($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function lte(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_LESS_OR_EQUAL, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_LESS_OR_EQUAL, $what, $to);
        }

        return $this->doLte($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function gte(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_GREATER_OR_EQUAL, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_GREATER_OR_EQUAL, $what, $to);
        }

        return $this->doGte($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function like(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        if (false === $this->supports(self::OPERATION_LIKE, $what, $to)) {
            throw new UnsupportedComparatorOperationException($this, self::OPERATION_LIKE, $what, $to);
        }

        return $this->doLike($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function compare(IdentifiableInterface $what, IdentifiableInterface $to): int
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
