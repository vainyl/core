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
use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;

/**
 * Class ArrayFactoryStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ArrayFactoryStorage extends AbstractStorageDecorator implements ArrayFactoryStorageInterface
{
    /**
     * @inheritDoc
     */
    public function addFactory(string $alias, ArrayFactoryInterface $factory): ArrayFactoryStorageInterface
    {
        $this->offsetSet($alias, $factory);

        return $this;
    }
}