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

use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;

/**
 * Class ExtensionStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ExtensionStorage extends AbstractStorageDecorator implements ExtensionStorageInterface
{
    /**
     * @inheritDoc
     */
    public function addExtension(AbstractExtension $extension) : ExtensionStorage
    {
        $this->offsetSet($extension->getName(), $extension);

        return $this;
    }
}