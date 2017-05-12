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

use Vainyl\Core\Application\ApplicationInterface;
use Vainyl\Core\Application\BootstrapperInterface;

/**
 * Class AbstractApplicationDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApplicationDecorator implements ApplicationInterface
{
    private $application;

    /**
     * AbstractApplicationDecorator constructor.
     *
     * @param ApplicationInterface $application
     */
    public function __construct(ApplicationInterface $application)
    {
        $this->application = $application;
    }

    /**
     * @inheritDoc
     */
    public function bootstrap(BootstrapperInterface $bootstrapper): ApplicationInterface
    {
        $this->application->bootstrap($bootstrapper);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->application->getId();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->application->getName();
    }
}