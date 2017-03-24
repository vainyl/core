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
namespace Vainyl\Core\Comparator\Storage;

use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\Comparator\Factory\ComparatorFactoryInterface;
use Vainyl\Core\Storage\Proxy\AbstractStorageProxy;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Class ComparatorStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ComparatorStorage extends AbstractStorageProxy
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
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->comparatorFactory->decorate(parent::offsetGet($offset));
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
}
