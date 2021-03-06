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

namespace Vainyl\Core;

/**
 * Class AbstractArray
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractArray extends AbstractIdentifiable implements ArrayInterface
{
    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];
        foreach (get_object_vars($this) as $field => $value) {
            if ($value instanceof ArrayInterface) {
                $array[$field] = $value->toArray();
            } else {
                $array[$field] = $value;
            }
        }

        return $array;
    }
}