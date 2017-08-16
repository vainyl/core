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

use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class AbstractContainerException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractContainerException extends AbstractCoreException implements ContainerExceptionInterface
{
    private $container;

    /**
     * AbstractContainerException constructor.
     *
     * @param Container       $container
     * @param string          $message
     * @param int             $code
     * @param \Throwable|null $previous
     */
    public function __construct(Container $container, string $message, int $code = 500, \Throwable $previous = null)
    {
        $this->container = $container;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['container' => spl_object_hash($this->container)], parent::toArray());
    }
}
