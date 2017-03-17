<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\Comparator;

use Vainyl\Core\Name\NameableInterface;

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
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    public function eq(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    public function neq(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    public function lt(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    public function gt(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    public function lte(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    public function gte(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return bool
     */
    public function like(ComparableInterface $what, ComparableInterface $to): bool;

    /**
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     *
     * @return int
     */
    public function compare(ComparableInterface $what, ComparableInterface $to): int;
}