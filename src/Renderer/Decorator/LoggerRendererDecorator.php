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

namespace Vainyl\Core\Renderer\Decorator;

use Psr\Log\LoggerInterface;
use Vainyl\Core\IdentifiableInterface;
use Vainyl\Core\Renderer\RendererInterface;

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
    public function render(IdentifiableInterface $identifiable): array
    {
        $this->logger->debug(sprintf('Trying to render object %s with renderer %s', $identifiable->getId(), $this->getName()));
        $result = parent::render($identifiable);
        $this->logger->debug(sprintf('Rendered object %s as %s', $identifiable->getId(), json_encode($result)));

        return $result;
    }
}
