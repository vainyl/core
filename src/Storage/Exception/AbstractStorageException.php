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

namespace Vainyl\Core\Storage\Exception;

use Vainyl\Core\Exception\AbstractCoreException;
use Vainyl\Core\Storage\StorageInterface;

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
     * @param StorageInterface $storage
     * @param string           $message
     * @param int              $code
     * @param \Exception|null  $previous
     */
    public function __construct(
        StorageInterface $storage,
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
        return array_merge(['storage' => $this->storage->getName()], parent::toArray());
    }

    /**
     * @inheritDoc
     */
    public function getStorage(): StorageInterface
    {
        return $this->storage;
    }
}
