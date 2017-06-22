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

namespace Vainyl\Core\Hydrator;

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Interface HydratorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HydratorInterface extends IdentifiableInterface
{
    /**
     * @param object $class
     *
     * @return bool
     */
    public function supports(object $class) : bool;

    /**
     * @param object $class
     * @param array  $data
     *
     * @return ArrayInterface
     */
    public function hydrate(object $class, array $data) : ArrayInterface;
}