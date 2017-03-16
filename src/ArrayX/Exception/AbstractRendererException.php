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
namespace Vainyl\Core\ArrayX\Exception;

use Vainyl\Core\ArrayX\ArrayInterface;
use Vainyl\Core\ArrayX\RendererInterface;
use Vainyl\Core\Exception\AbstractCoreException;

/**
 * Class AbstractRendererException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRendererException extends AbstractCoreException
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
}