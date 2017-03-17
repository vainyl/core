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
namespace Vainyl\Core\Comparator\Factory\Decorator;

use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\Comparator\Factory\ComparatorFactoryInterface;

/**
 * Class AbstractComparatorFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractComparatorFactoryDecorator implements ComparatorFactoryInterface
{
    private $comparatorFactory;

    /**
     * AbstractComparatorFactoryDecorator constructor.
     *
     * @param ComparatorFactoryInterface $comparatorFactory
     */
    public function __construct(ComparatorFactoryInterface $comparatorFactory)
    {
        $this->comparatorFactory = $comparatorFactory;
    }

    /**
     * @inheritDoc
     */
    public function decorate(ComparatorInterface $comparator): ComparatorInterface
    {
        return $this->comparatorFactory->decorate($comparator);
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->comparatorFactory->getId();
    }
}