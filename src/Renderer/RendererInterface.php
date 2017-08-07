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

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\NameableInterface;

/**
 * Interface RendererInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface RendererInterface extends NameableInterface
{
    /**
     * @param ArrayInterface $array
     *
     * @return array
     */
    public function render(ArrayInterface $array): array;
}
