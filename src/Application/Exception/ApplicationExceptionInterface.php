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

namespace Vainyl\Core\Application\Exception;

use Vainyl\Core\Application\ApplicationInterface;
use Vainyl\Core\ArrayInterface;

/**
 * Interface ApplicationExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApplicationExceptionInterface extends ArrayInterface, \Throwable
{
    /**
     * @return ApplicationInterface
     */
    public function getApplication(): ApplicationInterface;
}