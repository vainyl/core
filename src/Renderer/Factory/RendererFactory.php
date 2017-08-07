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

namespace Vainyl\Core\Renderer\Factory;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Renderer\RendererInterface;

/**
 * Class RendererFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RendererFactory extends AbstractIdentifiable implements RendererFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function decorate(RendererInterface $renderer): RendererInterface
    {
        return $renderer;
    }
}
