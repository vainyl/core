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
     * @param string $class
     *
     * @return bool
     */
    public function supports(string $class) : bool;

    /**
     * @param string $class
     * @param array  $data
     *
     * @return ArrayInterface
     */
    public function hydrate(string $class, array $data) : ArrayInterface;
}