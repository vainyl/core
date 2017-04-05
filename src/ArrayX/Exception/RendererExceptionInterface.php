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

namespace Vainyl\Core\ArrayX\Exception;

use Vainyl\Core\ArrayX\ArrayInterface;
use Vainyl\Core\ArrayX\RendererInterface;

/**
 * Interface RendererExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface RendererExceptionInterface extends ArrayInterface, \Throwable
{
    /**
     * @return RendererInterface
     */
    public function getRenderer() : RendererInterface;
}
