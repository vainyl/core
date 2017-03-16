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
namespace Vainyl\Core\ArrayX\Decorator;

use Vainyl\Core\ArrayX\ArrayInterface;
use Vainyl\Core\ArrayX\RendererInterface;

/**
 * Class AbstractRendererDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractRendererDecorator implements RendererInterface
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
