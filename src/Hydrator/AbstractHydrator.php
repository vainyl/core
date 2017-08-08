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

namespace Vainyl\Core\Hydrator;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\Exception\UnsupportedClassHydratorException;
use Vainyl\Core\IdentifiableInterface;

/**
 * Class AbstractHydrator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHydrator extends AbstractIdentifiable implements HydratorInterface
{
    /**
     * @param string $className
     * @param array  $data
     *
     * @return IdentifiableInterface
     */
    abstract public function doCreate(string $className, array $data): IdentifiableInterface;

    /**
     * @param object $object
     * @param array  $data
     *
     * @return IdentifiableInterface
     */
    abstract public function doUpdate($object, array $data): IdentifiableInterface;

    /**
     * @inheritDoc
     */
    public function create(string $className, array $data): IdentifiableInterface
    {
        if (false === $this->supports($className)) {
            throw new UnsupportedClassHydratorException($this, $className);
        }

        return $this->doCreate($className, $data);
    }

    /**
     * @inheritDoc
     */
    public function update($object, array $data): IdentifiableInterface
    {
        if (false === $this->supports(get_class($object))) {
            throw new UnsupportedClassHydratorException($this, get_class($object));
        }

        return $this->doUpdate($object, $data);
    }
}