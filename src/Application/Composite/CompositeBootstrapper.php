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

namespace Vainyl\Core\Application\Composite;

use Vainyl\Core\Application\ApplicationInterface;
use Vainyl\Core\Application\BootstrapperInterface;
use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;

/**
 * Class CompositeBootstrapper
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CompositeBootstrapper extends AbstractStorageDecorator implements BootstrapperInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'composite';
    }

    /**
     * @param string $alias
     *
     * @return BootstrapperInterface
     */
    public function getBootstrapper(string $alias): BootstrapperInterface
    {
        return $this->offsetGet($alias);
    }

    /**
     * @param BootstrapperInterface $bootstrapper
     *
     * @return BootstrapperInterface
     */
    public function addBootstrapper(BootstrapperInterface $bootstrapper): BootstrapperInterface
    {
        $this->offsetSet($bootstrapper->getName(), $bootstrapper);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function process(ApplicationInterface $application): BootstrapperInterface
    {
        /**
         * @var BootstrapperInterface $bootstrapper
         */
        foreach ($this->getIterator() as $bootstrapper) {
            $bootstrapper->process($application);
        }

        return $this;
    }
}