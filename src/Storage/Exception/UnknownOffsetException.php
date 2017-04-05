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

namespace Vainyl\Core\Storage\Exception;

/**
 * Class UnknownOffsetException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownOffsetException extends AbstractStorageException
{
    private $offset;

    /**
     * UnknownOffsetException constructor.
     *
     * @param \ArrayAccess $storage
     * @param string       $offset
     */
    public function __construct(\ArrayAccess $storage, string $offset)
    {
        $this->offset = $offset;
        parent::__construct(
            $storage,
            sprintf('Storage %s has no data by offset %s', spl_object_hash($storage), $offset)
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['offset' => $this->offset], parent::toArray());
    }
}
