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

/**
 * Class AbstractStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractStorage extends \ArrayObject implements StorageInterface
{
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
    public function getId(): string
    {
        return spl_object_hash($this);
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->storage);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->storage);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->storage);
    }

    /**
     * @inheritDoc
     */
    public function valid() : bool
    {
        return (null !== $this->key());
    }

    /**
     * @inheritDoc
     */
    public function rewind() : void
    {
        reset($this->storage);
    }
}
