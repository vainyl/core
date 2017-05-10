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

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\StringInterface;

/**
 * Interface EnvironmentInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EnvironmentInterface extends ArrayInterface, StringInterface
{
    /**
     * @return bool
     */
    public function isDebug() : bool;

    /**
     * @return bool
     */
    public function isCaching() : bool;
}