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
use Vainyl\Core\ArrayInterface;
use Vainyl\Core\Exception\UnsupportedClassHydratorException;

/**
 * Class AbstractHydrator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHydrator extends AbstractIdentifiable implements HydratorInterface
{
    /**
     * @param object $object
     * @param array  $data
     *
     * @return ArrayInterface
     */
    abstract public function doHydrate($object, array $data): ArrayInterface;

    /**
     * @inheritDoc
     */
    public function hydrate($object, array $data): ArrayInterface
    {
        if (false === $this->supports($object)) {
            throw new UnsupportedClassHydratorException($this, $object);
        }

        return $this->doHydrate($object, $data);
    }
}