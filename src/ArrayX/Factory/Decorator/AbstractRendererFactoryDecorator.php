<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\ArrayX\Factory\Decorator;

use Vainyl\Core\ArrayX\Factory\RendererFactoryInterface;
use Vainyl\Core\ArrayX\RendererInterface;

/**
 * Class AbstractRendererFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRendererFactoryDecorator implements RendererFactoryInterface
{
    private $rendererFactory;

    /**
     * AbstractRendererFactoryDecorator constructor.
     *
     * @param RendererFactoryInterface $rendererFactory
     */
    public function __construct(RendererFactoryInterface $rendererFactory)
    {
        $this->rendererFactory = $rendererFactory;
    }

    /**
     * @inheritDoc
     */
    public function decorate(RendererInterface $renderer): RendererInterface
    {
        return $this->rendererFactory->decorate($renderer);
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->rendererFactory->getId();
    }
}