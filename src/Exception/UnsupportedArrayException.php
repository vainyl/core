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

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\Renderer\RendererInterface;

/**
 * Class UnsupportedArrayException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedArrayException extends AbstractRendererException
{
    /**
     * UnsupportedArrayException constructor.
     *
     * @param RendererInterface $renderer
     * @param ArrayInterface    $array
     */
    public function __construct(RendererInterface $renderer, ArrayInterface $array)
    {
        parent::__construct($renderer, $array, 'Unsupported object');
    }
}
