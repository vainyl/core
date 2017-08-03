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

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\Comparator\Factory\ComparatorFactoryInterface;

/**
 * Class AbstractComparatorFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractComparatorFactoryDecorator extends AbstractIdentifiable implements ComparatorFactoryInterface
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
}
