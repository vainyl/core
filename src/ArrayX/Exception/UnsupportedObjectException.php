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
declare(strict_types = 1);
namespace Vainyl\Core\ArrayX\Exception;

use Vainyl\Core\ArrayX\ArrayInterface;
use Vainyl\Core\ArrayX\RendererInterface;

/**
 * Class UnsupportedObjectException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedObjectException extends AbstractRendererException
{
    /**
     * UnsupportedObjectException constructor.
     *
     * @param RendererInterface $renderer
     * @param ArrayInterface    $array
     */
    public function __construct(RendererInterface $renderer, ArrayInterface $array)
    {
        parent::__construct($renderer, $array, 'Unsupported object');
    }
}
