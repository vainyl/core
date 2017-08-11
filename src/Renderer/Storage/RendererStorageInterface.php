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

namespace Vainyl\Core\Renderer\Storage;

use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\Renderer\RendererInterface;

/**
 * Interface RendererStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface RendererStorageInterface extends IdentifiableInterface
{
    /**
     * @param string            $alias
     * @param RendererInterface $renderer
     *
     * @return RendererStorageInterface
     */
    public function addRenderer(string $alias, RendererInterface $renderer): RendererStorageInterface;

    /**
     * @param string $alias
     *
     * @return RendererInterface
     */
    public function getRenderer(string $alias): RendererInterface;
}