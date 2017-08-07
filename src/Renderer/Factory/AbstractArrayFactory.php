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

namespace Vainyl\Core\Renderer\Factory;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\ArrayInterface;
use Vainyl\Core\Exception\UnsupportedArrayClassException;

/**
 * Class AbstractArrayFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractArrayFactory extends AbstractIdentifiable implements ArrayFactoryInterface
{
    /**
     * @param string $name
     * @param array  $data
     *
     * @return ArrayInterface
     */
    abstract public function doCreate(string $name, array $data = []): ArrayInterface;

    /**
     * @inheritDoc
     */
    public function create(string $name, array $data = []): ArrayInterface
    {
        if (false === $this->supports($name)) {
            throw new UnsupportedArrayClassException($this, $name);
        }

        return $this->doCreate($name, $data);
    }
}