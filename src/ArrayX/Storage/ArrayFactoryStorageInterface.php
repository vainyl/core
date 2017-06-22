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

namespace Vainyl\Core\ArrayX\Storage;

use Vainyl\Core\ArrayX\Factory\ArrayFactoryInterface;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Interface ArrayFactoryStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ArrayFactoryStorageInterface extends StorageInterface
{
    /**
     * @param string                $alias
     * @param ArrayFactoryInterface $factory
     *
     * @return ArrayFactoryStorageInterface
     */
    public function addFactory(string $alias, ArrayFactoryInterface $factory) : ArrayFactoryStorageInterface;
}