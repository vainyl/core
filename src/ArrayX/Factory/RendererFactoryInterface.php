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
namespace Vainyl\Core\ArrayX\Factory;

use Vainyl\Core\ArrayX\RendererInterface;
use Vainyl\Core\Id\IdentifiableInterface;

/**
 * Interface RendererFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface RendererFactoryInterface extends IdentifiableInterface
{
    /**
     * @param RendererInterface $renderer
     *
     * @return RendererInterface
     */
    public function decorate(RendererInterface $renderer) : RendererInterface;
}
