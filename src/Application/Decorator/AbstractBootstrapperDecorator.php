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

namespace Vainyl\Core\Application\Decorator;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Application\ApplicationInterface;
use Vainyl\Core\Application\BootstrapperInterface;

/**
 * Class AbstractBootstrapperDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractBootstrapperDecorator extends AbstractIdentifiable implements BootstrapperInterface
{
    private $bootstrapper;

    /**
     * AbstractBootstrapperDecorator constructor.
     *
     * @param BootstrapperInterface $bootstrapper
     */
    public function __construct(BootstrapperInterface $bootstrapper)
    {
        $this->bootstrapper = $bootstrapper;
    }

    /**
     * @inheritDoc
     */
    public function process(ApplicationInterface $application): BootstrapperInterface
    {
        $this->bootstrapper->process($application);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->bootstrapper->getName();
    }
}
