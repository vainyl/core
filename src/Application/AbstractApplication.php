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

namespace Vainyl\Core\Application;

use Vainyl\Core\AbstractIdentifiable;

/**
 * Class AbstractApplication
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApplication extends AbstractIdentifiable implements ApplicationInterface
{
    /**
     * @inheritDoc
     */
    public function bootstrap(BootstrapperInterface $bootstrapper): ApplicationInterface
    {
        $bootstrapper->process($this);

        return $this;
    }
}