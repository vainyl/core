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

namespace Vainyl\Core\Exception;

use Vainyl\Core\Storage\StorageInterface;

/**
 * Class DuplicateOffsetException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateOffsetException extends AbstractStorageException
{
    private $offset;

    private $newValue;

    private $oldValue;

    /**
     * DuplicateOffsetException constructor.
     *
     * @param StorageInterface $storage
     * @param string           $offset
     * @param int              $newValue
     * @param \Exception|null  $oldValue
     */
    public function __construct(StorageInterface $storage, $offset, $newValue, $oldValue)
    {
        $this->offset = $offset;
        $this->newValue = $newValue;
        $this->oldValue = $oldValue;
        parent::__construct(
            $storage,
            sprintf(
                'Storage %s already contains value %s by offset %s',
                spl_object_hash($storage),
                is_object($oldValue) ? get_class($oldValue) : var_export($oldValue, true),
                $offset
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(
            ['offset' => $this->offset, 'old_value' => $this->oldValue, 'new_value' => $this->newValue],
            parent::toArray()
        );
    }
}