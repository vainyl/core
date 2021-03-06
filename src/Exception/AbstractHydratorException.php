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

use Vainyl\Core\Hydrator\HydratorInterface;

/**
 * Class AbstractHydratorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHydratorException extends AbstractCoreException implements HydratorExceptionInterface
{
    private $hydrator;

    /**
     * AbstractHydratorException constructor.
     *
     * @param HydratorInterface $registry
     * @param string            $message
     * @param int               $code
     * @param \Throwable|null   $previous
     */
    public function __construct(
        HydratorInterface $registry,
        string $message,
        int $code = 500,
        \Throwable $previous = null
    ) {
        $this->hydrator = $registry;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getHydrator(): HydratorInterface
    {
        return $this->hydrator;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['hydrator' => $this->hydrator->getId()], parent::toArray());
    }
}