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

namespace Vainyl\Core\Application\Composite;

use Vainyl\Core\Application\ApplicationInterface;
use Vainyl\Core\Application\BootstrapperInterface;
use Vainyl\Core\Storage\AbstractStorage;

/**
 * Class CompositeBootstrapper
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CompositeBootstrapper extends AbstractStorage implements BootstrapperInterface
{
    /**
     * @param BootstrapperInterface $bootstrapper
     *
     * @return BootstrapperInterface
     */
    public function addBootstrapper(BootstrapperInterface $bootstrapper) : BootstrapperInterface
    {
        $this[] = $bootstrapper;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function process(ApplicationInterface $application): BootstrapperInterface
    {
        foreach ($this as $bootstrapper) {
            $application->bootstrap($bootstrapper);
        }

        return $this;
    }
}