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
declare(strict_types = 1);
namespace Vainyl\Core\Storage;

use Vainyl\Core\Id\AbstractIdentifiable;

/**
 * Class AbstractStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractStorage extends AbstractIdentifiable implements StorageInterface
{

    private $storage = [];

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return basename(get_class($this));
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->storage);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        if (false === array_key_exists($offset, $this->storage)) {

        }

        return $this->storage[$offset];
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->storage[$offset] = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        if (false === array_key_exists($offset, $this->storage)) {
            return $this;
        }

        unset($this->storage[$offset]);

        return $this;
    }
}