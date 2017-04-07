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

namespace Vainyl\Core\ArrayX\Factory;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\ArrayX\RendererInterface;

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
