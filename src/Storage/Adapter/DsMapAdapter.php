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
    private $map;

    /**
     * AbstractStorageDecorator constructor.
     *
     * @param Map $map
     */
    public function __construct(Map $map)
    {
        $this->map = $map;
    }

    /**
     * @inheritDoc
     */
    public function __clone()
    {
        $this->map = clone $this->map;
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return $this->map->count();
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): ReconstructableInterface
    {
        $this->map->clear();
        $this->map->putAll($data);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \IteratorIterator($this->map);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return $this->map->hasKey($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->map->get($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->map->put($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        // Second argument for avoid OutOfBound exception
        $this->map->remove($offset, null);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $data = [];
        foreach ($this->map as $key => $element) {
            if ($element instanceof ArrayInterface) {
                $data[] = $element->toArray();
            } else {
                $data[] = $element;
            }
        }

        return $data;
    }
}
