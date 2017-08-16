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

use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\Renderer\RendererInterface;

/**
 * Class AbstractRendererException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRendererException extends AbstractCoreException implements RendererExceptionInterface
{
    private $renderer;

    private $identifiable;

    /**
     * AbstractRendererException constructor.
     *
     * @param RendererInterface     $renderer
     * @param IdentifiableInterface $identifiable
     * @param string                $message
     * @param int                   $code
     * @param \Throwable|null       $previous
     */
    public function __construct(
        RendererInterface $renderer,
        IdentifiableInterface $identifiable,
        string $message,
        int $code = 500,
        \Throwable $previous = null
    ) {
        $this->renderer = $renderer;
        $this->identifiable = $identifiable;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getRenderer(): RendererInterface
    {
        return $this->renderer;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(
            ['renderer' => $this->renderer->getId(), 'identifiable' => get_class($this->identifiable)],
            parent::toArray()
        );
    }
}
