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
namespace Vainyl\Core\ArrayX\Factory\Decorator;

use Psr\Log\LoggerInterface;
use Vainyl\Core\ArrayX\Decorator\LoggerRendererDecorator;
use Vainyl\Core\ArrayX\Factory\RendererFactoryInterface;
use Vainyl\Core\ArrayX\RendererInterface;

/**
 * Class LoggerRendererFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerRendererFactoryDecorator extends AbstractRendererFactoryDecorator
{
    private $logger;

    /**
     * LoggerRendererFactoryDecorator constructor.
     *
     * @param RendererFactoryInterface $rendererFactory
     * @param LoggerInterface          $logger
     */
    public function __construct(RendererFactoryInterface $rendererFactory, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($rendererFactory);
    }

    /**
     * @inheritDoc
     */
    public function decorate(RendererInterface $renderer): RendererInterface
    {
        return new LoggerRendererDecorator(parent::decorate($renderer), $this->logger);
    }
}
