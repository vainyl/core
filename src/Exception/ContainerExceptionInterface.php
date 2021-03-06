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

/**
 * Interface ContainerExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ContainerExceptionInterface extends CoreExceptionInterface
{
    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface;
}
