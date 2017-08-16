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

use Vainyl\Core\Hydrator\Registry\HydratorRegistryInterface;

/**
 * Class AbstractHydratorRegistryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHydratorRegistryException extends AbstractCoreException implements
    HydratorRegistryExceptionInterface
{
    private $registry;

    /**
     * AbstractHydratorRegistryException constructor.
     *
     * @param HydratorRegistryInterface $registry
     * @param string                    $message
     * @param int                       $code
     * @param \Throwable|null           $previous
     */
    public function __construct(
        HydratorRegistryInterface $registry,
        string $message,
        int $code = 500,
        \Throwable $previous = null
    ) {
        $this->registry = $registry;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getRegistry(): HydratorRegistryInterface
    {
        return $this->registry;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['registry' => $this->registry->getId()], parent::toArray());
    }
}