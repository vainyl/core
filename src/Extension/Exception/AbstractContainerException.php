<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);

namespace Vainyl\Core\Extension\Exception;

use Symfony\Component\DependencyInjection\Container;
use Vainyl\Core\Exception\AbstractCoreException;

/**
 * Class AbstractContainerException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractContainerException extends AbstractCoreException
{
    private $container;

    /**
     * AbstractContainerException constructor.
     *
     * @param Container       $container
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct(Container $container, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->container = $container;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['container' => spl_object_hash($this->container), parent::toArray()]);
    }
}