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

namespace Vainyl\Core\Comparator\Proxy;

use Vainyl\Core\Comparator\ComparableInterface;
use Vainyl\Core\Comparator\ComparatorInterface;

/**
 * Class AbstractComparatorProxy
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractComparatorProxy implements ComparatorInterface
{
    private $comparator;

    /**
     * AbstractComparatorDecorator constructor.
     *
     * @param ComparatorInterface $comparator
     */
    public function __construct(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    /**
     * @inheritDoc
     */
    public function eq(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $this->comparator->eq($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function neq(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $this->comparator->neq($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function lt(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $this->comparator->lt($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function gt(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $this->comparator->gt($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function lte(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $this->comparator->lte($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function gte(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $this->comparator->gte($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function like(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $this->comparator->like($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function compare(ComparableInterface $what, ComparableInterface $to): int
    {
        return $this->comparator->compare($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->comparator->getId();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->comparator->getName();
    }
}