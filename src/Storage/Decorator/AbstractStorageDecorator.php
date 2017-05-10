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

namespace Vainyl\Core\Storage\Decorator;

use Ds\Map;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class AbstractStorageDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractStorageDecorator extends AbstractIdentifiable implements StorageInterface
{
    private $storage;

    /**
     * AbstractStorageDecorator constructor.
     *
     * @param Map $storage
     */
    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return $this->storage->getIterator();
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return $this->storage->offsetExists($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->storage->offsetGet($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->storage->offsetSet($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        $this->storage->offsetUnset($offset);
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->storage->count();
    }
}
