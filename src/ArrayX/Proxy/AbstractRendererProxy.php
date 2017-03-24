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

namespace Vainyl\Core\ArrayX\Proxy;

use Vainyl\Core\ArrayX\ArrayInterface;
use Vainyl\Core\ArrayX\RendererInterface;

/**
 * Class AbstractRendererProxy
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRendererProxy implements RendererInterface
{
    private $renderer;

    /**
     * AbstractRendererDecorator constructor.
     *
     * @param RendererInterface $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->renderer->getId();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->renderer->getName();
    }

    /**
     * @inheritDoc
     */
    public function render(ArrayInterface $array): array
    {
        return $this->renderer->render($array);
    }
}