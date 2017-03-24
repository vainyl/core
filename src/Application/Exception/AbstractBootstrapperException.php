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

namespace Vainyl\Core\Application\Exception;

use Vainyl\Core\Application\BootstrapperInterface;
use Vainyl\Core\Exception\AbstractCoreException;

/**
 * Class AbstractBootstrapperException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractBootstrapperException extends AbstractCoreException implements BootstrapperExceptionInterface
{
    private $bootstrapper;

    /**
     * AbstractBootstrapperException constructor.
     *
     * @param BootstrapperInterface $bootstrapper
     * @param string                $message
     * @param int                   $code
     * @param \Exception|null       $previous
     */
    public function __construct(
        BootstrapperInterface $bootstrapper,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->bootstrapper = $bootstrapper;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getBootstrapper(): BootstrapperInterface
    {
        return $this->bootstrapper;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['bootstrapper' => $this->bootstrapper->getName()], parent::toArray());
    }
}