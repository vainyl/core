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

namespace Vainyl\Core\Hydrator\Storage;

use Vainyl\Core\Hydrator\HydratorInterface;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Interface HydratorStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HydratorStorageInterface extends StorageInterface
{
    /**
     * @param string            $alias
     * @param HydratorInterface $hydrator
     *
     * @return HydratorStorageInterface
     */
    public function addHydrator(string $alias, HydratorInterface $hydrator): HydratorStorageInterface;
}