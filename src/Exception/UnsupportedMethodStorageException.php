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
     * @param \ArrayAccess $storage
     * @param string       $method
     */
    public function __construct(\ArrayAccess $storage, string $method)
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