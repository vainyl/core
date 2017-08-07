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

namespace Vainyl\Core\Renderer;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Exception\UnsupportedArrayException;
use Vainyl\Core\IdentifiableInterface;

/**
 * Class AbstractRenderer
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRenderer extends AbstractIdentifiable implements RendererInterface
{
    /**
     * @param IdentifiableInterface $identifiable
     *
     * @return bool
     */
    abstract public function supports(IdentifiableInterface $identifiable): bool;

    /**
     * @param IdentifiableInterface $identifiable
     *
     * @return array
     */
    abstract public function doRender(IdentifiableInterface $identifiable): array;

    /**
     * @inheritDoc
     */
    public function render(IdentifiableInterface $identifiable): array
    {
        if (false === $this->supports($identifiable)) {
            throw new UnsupportedArrayException($this, $identifiable);
        }

        return $this->doRender($identifiable);
    }
}
