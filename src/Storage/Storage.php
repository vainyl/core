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
 * Class Storage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Storage extends \ArrayObject implements StorageInterface
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
        return $this->getIterator()->current();
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->getIterator()->next();
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->getIterator()->key();
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return $this->getIterator()->valid();
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->getIterator()->rewind();
    }
}
