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

namespace Vainyl\Core\Storage\Exception;

use Vainyl\Core\ArrayInterface;

/**
 * Interface StorageExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface StorageExceptionInterface extends ArrayInterface, \Throwable
{
    /**
     * @return \ArrayAccess
     */
    public function getStorage(): \ArrayAccess;
}
