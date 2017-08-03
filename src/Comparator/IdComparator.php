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

use Vainyl\Core\IdentifiableInterface;

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
    public function supports(string $operation, IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function doEq(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $what->getId() === $to->getId();
    }

    /**
     * @inheritDoc
     */
    public function doNeq(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return $what->getId() !== $to->getId();
    }

    /**
     * @inheritDoc
     */
    public function doLt(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return strcmp($what->getId(), $to->getId()) < 0;
    }

    /**
     * @inheritDoc
     */
    public function doGt(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return strcmp($what->getId(), $to->getId()) > 0;
    }

    /**
     * @inheritDoc
     */
    public function doLte(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return strcmp($what->getId(), $to->getId()) <= 0;
    }

    /**
     * @inheritDoc
     */
    public function doGte(IdentifiableInterface $what, IdentifiableInterface $to): bool
    {
        return strcmp($what->getId(), $to->getId()) >= 0;
    }

    /**
     * @inheritDoc
     */
    public function doLike(IdentifiableInterface $what, IdentifiableInterface $to): bool
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
