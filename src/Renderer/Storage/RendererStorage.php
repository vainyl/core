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

use Vainyl\Core\Renderer\Factory\RendererFactoryInterface;
use Vainyl\Core\Renderer\RendererInterface;
use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class RendererStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RendererStorage extends AbstractStorageDecorator implements RendererStorageInterface
{
    private $renderFactory;

    /**
     * RendererStorage constructor.
     *
     * @param StorageInterface         $storage
     * @param RendererFactoryInterface $container
     */
    public function __construct(StorageInterface $storage, RendererFactoryInterface $container)
    {
        $this->renderFactory = $container;
        parent::__construct($storage);
    }

    /**
     * @param string            $alias
     * @param RendererInterface $renderer
     *
     * @return RendererStorageInterface
     */
    public function addRenderer(string $alias, RendererInterface $renderer): RendererStorageInterface
    {
        $this->offsetSet($alias, $this->renderFactory->decorate($renderer));

        return $this;
    }

    /**
     * @param string $alias
     *
     * @return RendererInterface
     */
    public function getRenderer(string $alias): RendererInterface
    {
        return $this->offsetGet($alias);
    }
}
