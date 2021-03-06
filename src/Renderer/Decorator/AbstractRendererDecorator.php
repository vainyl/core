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

namespace Vainyl\Core\Renderer\Decorator;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\Renderer\RendererInterface;

/**
 * Class AbstractRendererDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRendererDecorator extends AbstractIdentifiable implements RendererInterface
{
    private $renderer;

    /**
     * AbstractRendererDecorator constructor.
     *
     * @param RendererInterface $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @inheritDoc
     */
    public function render(IdentifiableInterface $identifiable): array
    {
        return $this->renderer->render($identifiable);
    }
}
