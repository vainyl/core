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

namespace Vainyl\Core\Comparator\Factory\Decorator;

use Psr\Log\LoggerInterface;
use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\Comparator\Decorator\LoggerComparatorDecorator;
use Vainyl\Core\Comparator\Factory\ComparatorFactoryInterface;

/**
 * Class LoggerComparatorFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerComparatorFactoryDecorator extends AbstractComparatorFactoryDecorator
{
    private $logger;

    /**
     * LoggerComparatorFactoryDecorator constructor.
     *
     * @param ComparatorFactoryInterface $comparatorFactory
     * @param LoggerInterface            $logger
     */
    public function __construct(ComparatorFactoryInterface $comparatorFactory, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($comparatorFactory);
    }

    /**
     * @inheritDoc
     */
    public function decorate(ComparatorInterface $comparator): ComparatorInterface
    {
        return new LoggerComparatorDecorator(parent::decorate($comparator), $this->logger);
    }
}
