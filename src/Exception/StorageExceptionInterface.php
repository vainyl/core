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

namespace Vainyl\Core\Exception;

use Vainyl\Core\Storage\StorageInterface;

/**
 * Interface StorageExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface StorageExceptionInterface extends CoreExceptionInterface
{
    /**
     * @return StorageInterface
     */
    public function getStorage(): StorageInterface;
}
