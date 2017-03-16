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
namespace Vainyl\Core\Comparator\Storage;

use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\Comparator\Factory\ComparatorFactoryInterface;
use Vainyl\Core\Id\Storage\AbstractIdentifiableStorage;

/**
 * Class ComparatorStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ComparatorStorage extends AbstractIdentifiableStorage
{
    private $comparators = [];

    private $comparatorFactory;

    /**
     * ComparatorStorage constructor.
     *
     * @param ComparatorFactoryInterface $comparatorFactory
     */
    public function __construct(ComparatorFactoryInterface $comparatorFactory)
    {
        $this->comparatorFactory = $comparatorFactory;
    }

    /**
     * @param string $alias
     *
     * @return ComparatorInterface
     */
    public function getComparator(string $alias) : ComparatorInterface
    {
        if (false === array_key_exists($alias, $this->comparators)) {
            $this->comparators[$alias] = $this->comparatorFactory->decorate($this->offsetGet($alias));
        }

        return $this->comparators[$alias];
    }
}