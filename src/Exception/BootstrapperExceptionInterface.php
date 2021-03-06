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

use Vainyl\Core\Application\BootstrapperInterface;

/**
 * Interface BootstrapperExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface BootstrapperExceptionInterface extends CoreExceptionInterface
{
    /**
     * @return BootstrapperInterface
     */
    public function getBootstrapper(): BootstrapperInterface;
}