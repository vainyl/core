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

use Ds\Map;
use Vainyl\Core\ArrayX\Factory\RendererFactoryInterface;
use Vainyl\Core\ArrayX\RendererInterface;
use Vainyl\Core\Storage\Proxy\AbstractStorageProxy;

/**
 * Class RendererStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RendererStorage extends AbstractStorageProxy
{
    private $renderFactory;

    /**
     * RendererStorage constructor.
     *
     * @param Map                      $storage
     * @param RendererFactoryInterface $rendererFactory
     */
    public function __construct(Map $storage, RendererFactoryInterface $rendererFactory)
    {
        $this->renderFactory = $rendererFactory;
        parent::__construct($storage);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->renderFactory->decorate(parent::offsetGet($offset));
    }

    /**
     * @param string            $alias
     * @param RendererInterface $renderer
     *
     * @return RendererStorage
     */
    public function addRenderer(string $alias, RendererInterface $renderer): RendererStorage
    {
        $this->offsetSet($alias, $renderer);

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
