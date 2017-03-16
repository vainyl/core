<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\ArrayX\Storage;

use Vainyl\Core\ArrayX\Factory\RendererFactoryInterface;
use Vainyl\Core\ArrayX\RendererInterface;
use Vainyl\Core\Id\Storage\AbstractIdentifiableStorage;

/**
 * Class RendererStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RendererStorage extends AbstractIdentifiableStorage
{
    private $renderers = [];

    private $renderFactory;

    /**
     * RendererStorage constructor.
     *
     * @param RendererFactoryInterface $rendererFactory
     */
    public function __construct(RendererFactoryInterface $rendererFactory)
    {
        $this->renderFactory = $rendererFactory;
    }

    /**
     * @param string $alias
     *
     * @return RendererInterface
     */
    public function getRenderer(string $alias) : RendererInterface
    {
        if (false === array_key_exists($alias, $this->renderers)) {
            $this->renderers[$alias] = $this->renderFactory->decorate($this->offsetGet($alias));
        }

        return $this->renderers[$alias];
    }
}