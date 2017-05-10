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

namespace Vainyl\Core\ArrayX\Storage;

use Vainyl\Core\ArrayX\RendererInterface;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Interface RendererStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface RendererStorageInterface extends StorageInterface
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