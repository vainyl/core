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

namespace Vainyl\Core\Exception;

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\Renderer\RendererInterface;

/**
 * Class AbstractRendererException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRendererException extends AbstractCoreException implements RendererExceptionInterface
{
    private $renderer;

    private $array;

    /**
     * AbstractRendererException constructor.
     *
     * @param RendererInterface $renderer
     * @param ArrayInterface    $array
     * @param string            $message
     * @param int               $code
     * @param \Exception|null   $previous
     */
    public function __construct(
        RendererInterface $renderer,
        ArrayInterface $array,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->renderer = $renderer;
        $this->array = $array;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(
            ['renderer' => $this->renderer->getName(), 'array' => get_class($this->array)],
            parent::toArray()
        );
    }

    /**
     * @inheritDoc
     */
    public function getRenderer(): RendererInterface
    {
        return $this->renderer;
    }
}
