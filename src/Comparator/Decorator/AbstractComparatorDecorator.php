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

namespace Vainyl\Core\Comparator\Decorator;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Class AbstractComparatorDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractComparatorDecorator extends AbstractIdentifiable implements ComparatorInterface
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
    public function eq(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $this->comparator->eq($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function neq(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $this->comparator->neq($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function lt(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $this->comparator->lt($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function gt(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $this->comparator->gt($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function lte(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $this->comparator->lte($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function gte(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $this->comparator->gte($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function like(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $this->comparator->like($what, $to);
    }

    /**
     * @inheritDoc
     */
    public function compare(IdentifiableInterface $what, IdentifiableInterface $to): int
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
