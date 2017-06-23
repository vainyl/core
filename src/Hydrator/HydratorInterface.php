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
     * @param string $className
     *
     * @return bool
     */
    public function supports(string $className): bool;

    /**
     * @param string $className
     * @param array  $data
     *
     * @return ArrayInterface
     */
    public function create(string $className, array $data): ArrayInterface;

    /**
     * @param object $object
     * @param array  $data
     *
     * @return ArrayInterface
     */
    public function update($object, array $data): ArrayInterface;
}