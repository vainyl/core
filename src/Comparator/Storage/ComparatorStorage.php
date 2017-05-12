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

namespace Vainyl\Core\Comparator\Storage;

use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\Comparator\Factory\ComparatorFactoryInterface;
use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class ComparatorStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ComparatorStorage extends AbstractStorageDecorator
{
    private $comparatorFactory;

    /**
     * ComparatorStorage constructor.
     *
     * @param StorageInterface           $storage
     * @param ComparatorFactoryInterface $comparatorFactory
     */
    public function __construct(StorageInterface $storage, ComparatorFactoryInterface $comparatorFactory)
    {
        $this->comparatorFactory = $comparatorFactory;
        parent::__construct($storage);
    }

    /**
     * @param string $alias
     *
     * @return ComparatorInterface
     */
    public function getComparator(string $alias): ComparatorInterface
    {
        return $this->offsetGet($alias);
    }

    /**
     * @param string              $name
     * @param ComparatorInterface $comparator
     *
     * @return ComparatorStorage
     */
    public function addComparator(string $name, ComparatorInterface $comparator): ComparatorStorage
    {
        $this->offsetSet($name, $this->comparatorFactory->decorate($comparator));

        return $this;
    }
}
