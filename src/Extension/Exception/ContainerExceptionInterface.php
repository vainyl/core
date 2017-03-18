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

use Psr\Container\ContainerInterface;
use Vainyl\Core\ArrayX\ArrayInterface;

/**
 * Interface ContainerExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ContainerExceptionInterface extends ArrayInterface, \Throwable
{
    /**
     * @return ContainerInterface
     */
    public function getContainer() : ContainerInterface;
}