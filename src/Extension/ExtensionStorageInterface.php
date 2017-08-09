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

use Vainyl\Core\IdentifiableInterface;

/**
 * Interface ExtensionStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ExtensionStorageInterface extends IdentifiableInterface
{
    /**
     * @param AbstractExtension $extension
     *
     * @return ExtensionStorage
     */
    public function addExtension(AbstractExtension $extension): ExtensionStorage;
}