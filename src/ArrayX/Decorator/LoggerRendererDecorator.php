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

namespace Vainyl\Core\ArrayX\Decorator;

use Psr\Log\LoggerInterface;
use Vainyl\Core\ArrayInterface;
use Vainyl\Core\ArrayX\RendererInterface;

/**
 * Class LoggerRendererDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerRendererDecorator extends AbstractRendererDecorator
{
    private $logger;

    /**
     * LoggerRendererDecorator constructor.
     *
     * @param RendererInterface $renderer
     * @param LoggerInterface   $logger
     */
    public function __construct(RendererInterface $renderer, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($renderer);
    }

    /**
     * @inheritDoc
     */
    public function render(ArrayInterface $array): array
    {
        $this->logger->debug(sprintf('Trying to render object %s with renderer %s', $array->getId(), $this->getName()));
        $result = parent::render($array);
        $this->logger->debug(sprintf('Rendered object %s as %s', $array->getId(), json_encode($result)));

        return $result;
    }
}
