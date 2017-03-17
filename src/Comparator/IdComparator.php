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

namespace Vainyl\Core\Comparator;

/**
 * Class IdComparator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class IdComparator extends AbstractComparator
{
    /**
     * @inheritDoc
     */
    public function supports(string $operation, ComparableInterface $what, ComparableInterface $to): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function doEq(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $what->getId() === $to->getId();
    }

    /**
     * @inheritDoc
     */
    public function doNeq(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $what->getId() !== $to->getId();
    }

    /**
     * @inheritDoc
     */
    public function doLt(ComparableInterface $what, ComparableInterface $to): bool
    {
        return strcmp($what->getId(), $to->getId()) < 0;
    }

    /**
     * @inheritDoc
     */
    public function doGt(ComparableInterface $what, ComparableInterface $to): bool
    {
        return strcmp($what->getId(), $to->getId()) > 0;
    }

    /**
     * @inheritDoc
     */
    public function doLte(ComparableInterface $what, ComparableInterface $to): bool
    {
        return strcmp($what->getId(), $to->getId()) <= 0;
    }

    /**
     * @inheritDoc
     */
    public function doGte(ComparableInterface $what, ComparableInterface $to): bool
    {
        return strcmp($what->getId(), $to->getId()) >= 0;
    }

    /**
     * @inheritDoc
     */
    public function doLike(ComparableInterface $what, ComparableInterface $to): bool
    {
        return $what->getId() === $to->getId();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'id';
    }
}