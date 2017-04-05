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

use Ds\Set;
use Vainyl\Core\Application\ApplicationInterface;
use Vainyl\Core\Application\BootstrapperInterface;
use Vainyl\Core\Id\AbstractIdentifiable;

/**
 * Class CompositeBootstrapper
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CompositeBootstrapper extends AbstractIdentifiable implements BootstrapperInterface
{
    private $storage;

    /**
     * CompositeBootstrapper constructor.
     *
     * @param Set $storage
     */
    public function __construct(Set $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return basename(get_class($this));
    }

    /**
     * @param BootstrapperInterface $bootstrapper
     *
     * @return BootstrapperInterface
     */
    public function addBootstrapper(BootstrapperInterface $bootstrapper): BootstrapperInterface
    {
        $this->storage->add($bootstrapper);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function process(ApplicationInterface $application): BootstrapperInterface
    {
        foreach ($this->storage as $bootstrapper) {
            $application->bootstrap($bootstrapper);
        }

        return $this;
    }
}