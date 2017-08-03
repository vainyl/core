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

namespace Vainyl\Core\Extension;

use Vainyl\Core\Storage\StorageInterface;

/**
 * Interface ExtensionStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ExtensionStorageInterface extends StorageInterface
{
    /**
     * @param AbstractExtension $extension
     *
     * @return ExtensionStorage
     */
    public function addExtension(AbstractExtension $extension): ExtensionStorage;
}