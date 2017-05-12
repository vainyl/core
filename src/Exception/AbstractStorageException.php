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

use Vainyl\Core\Exception\AbstractCoreException;

/**
 * Class AbstractStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractStorageException extends AbstractCoreException implements StorageExceptionInterface
{
    private $storage;

    /**
     * AbstractStorageException constructor.
     *
     * @param \ArrayAccess    $storage
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct(
        \ArrayAccess $storage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->storage = $storage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['storage' => spl_object_hash($this->storage)], parent::toArray());
    }

    /**
     * @inheritDoc
     */
    public function getStorage(): \ArrayAccess
    {
        return $this->storage;
    }
}
