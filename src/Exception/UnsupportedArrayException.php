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

use Vainyl\Core\IdentifiableInterface;
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
     * @param RendererInterface     $renderer
     * @param IdentifiableInterface $identifiable
     */
    public function __construct(RendererInterface $renderer, IdentifiableInterface $identifiable)
    {
        parent::__construct($renderer, $identifiable, 'Unsupported object');
    }
}
