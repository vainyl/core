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

namespace Vainyl\Core\Storage\Adapter;

use Ds\Map;
use Vainyl\Core\AbstractArray;
use Vainyl\Core\ArrayInterface;
use Vainyl\Core\ReconstructableInterface;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class DsMapAdapter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DsMapAdapter extends AbstractArray implements StorageInterface
{
    private $storage;

    /**
     * AbstractStorageDecorator constructor.
     *
     * @param Map $storage
     */
    public function __construct(Map $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return $this->storage->count();
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): ReconstructableInterface
    {
        $this->storage->clear();
        $this->storage->putAll($data);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \IteratorIterator($this->storage);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return $this->storage->hasKey($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->storage->get($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->storage->put($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        $this->storage->remove($offset);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $data = [];
        foreach ($this->storage as $key => $element) {
            if ($element instanceof ArrayInterface) {
                $data[] = $element->toArray();
            } else {
                $data[] = $element;
            }
        }

        return $data;
    }
}