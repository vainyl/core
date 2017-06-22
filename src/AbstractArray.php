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
    public function toArray(): array
    {
        $array = [];
        foreach (get_object_vars($this) as $field => $value) {
            switch (true) {
                case (false === is_object($value)):
                    $array[$field] = $value;
                    break;
                case ($value instanceof ArrayInterface):
                    $array[$field] = $value->toArray();
                    break;
            }
        }

        return $array;
    }
}