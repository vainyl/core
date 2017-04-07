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

namespace Vainyl\Core\Comparator\Factory;

use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Interface ComparatorFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ComparatorFactoryInterface extends IdentifiableInterface
{
    /**
     * @param ComparatorInterface $comparator
     *
     * @return ComparatorInterface
     */
    public function decorate(ComparatorInterface $comparator): ComparatorInterface;
}
