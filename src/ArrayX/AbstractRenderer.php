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

namespace Vainyl\Core\ArrayX;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\ArrayInterface;
use Vainyl\Core\Exception\UnsupportedArrayException;

/**
 * Class AbstractRenderer
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRenderer extends AbstractIdentifiable implements RendererInterface
{
    /**
     * @param ArrayInterface $array
     *
     * @return bool
     */
    abstract public function supports(ArrayInterface $array): bool;

    /**
     * @param ArrayInterface $array
     *
     * @return array
     */
    abstract public function doRender(ArrayInterface $array): array;

    /**
     * @inheritDoc
     */
    public function render(ArrayInterface $array): array
    {
        if (false === $this->supports($array)) {
            throw new UnsupportedArrayException($this, $array);
        }

        return $this->doRender($array);
    }
}
