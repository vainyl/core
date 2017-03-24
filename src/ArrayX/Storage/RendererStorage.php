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
namespace Vainyl\Core\ArrayX\Storage;

use Vainyl\Core\ArrayX\Factory\RendererFactoryInterface;
use Vainyl\Core\ArrayX\RendererInterface;
use Vainyl\Core\Storage\Proxy\AbstractStorageProxy;
use Vainyl\Core\Storage\StorageInterface;

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
     * @param StorageInterface         $storage
     * @param RendererFactoryInterface $rendererFactory
     */
    public function __construct(StorageInterface $storage, RendererFactoryInterface $rendererFactory)
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
     * @param string $alias
     *
     * @return RendererInterface
     */
    public function getRenderer(string $alias) : RendererInterface
    {
        return $this->offsetGet($alias);
    }
}
