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
use Vainyl\Core\NameableInterface;

/**
 * Interface ComparatorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ComparatorInterface extends NameableInterface
{
    const RESULT_EQUAL = 0;
    const RESULT_LESS = -1;
    const RESULT_GREATER = 1;
    const OPERATION_EQUAL = 'eq';
    const OPERATION_NOT_EQUAL = 'neq';
    const OPERATION_LESS = 'lt';
    const OPERATION_GREATER = 'gt';
    const OPERATION_LESS_OR_EQUAL = 'lte';
    const OPERATION_GREATER_OR_EQUAL = 'gte';
    const OPERATION_LIKE = 'like';

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    public function eq(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    public function neq(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    public function lt(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    public function gt(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    public function lte(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    public function gte(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return bool
     */
    public function like(IdentifiableInterface $what, IdentifiableInterface $to): bool;

    /**
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     *
     * @return int
     */
    public function compare(IdentifiableInterface $what, IdentifiableInterface $to): int;
}
