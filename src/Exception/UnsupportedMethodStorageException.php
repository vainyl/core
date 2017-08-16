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
 * Class UnsupportedMethodStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedMethodStorageException extends AbstractStorageException
{
    private $method;

    /**
     * UnsupportedMethodStorageException constructor.
     *
     * @param StorageInterface $storage
     * @param string           $method
     */
    public function __construct(StorageInterface $storage, string $method)
    {
        $this->method = $method;
        parent::__construct($storage, sprintf('Method %s is not supported', $method));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['method' => $this->method], parent::toArray());
    }
}