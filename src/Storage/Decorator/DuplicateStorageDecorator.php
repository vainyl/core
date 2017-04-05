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

namespace Vainyl\Core\Storage\Decorator;

/**
 * Class DuplicateStorageDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateStorageDecorator extends AbstractStorageDecorator
{
    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        if ($this->offsetExists($offset)) {

        }

        parent::offsetSet($offset, $value);
    }
}