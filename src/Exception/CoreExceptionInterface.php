<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\Exception;

use Vainyl\Core\ArrayX\ArrayInterface;

/**
 * Class CoreException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CoreExceptionInterface extends ArrayInterface, \Throwable
{
}
