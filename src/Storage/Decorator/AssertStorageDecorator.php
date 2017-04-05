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

use Vainyl\Core\Storage\Exception\UnknownOffsetException;

/**
 * Class AssertStorageDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AssertStorageDecorator extends AbstractStorageDecorator
{
    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        if (false === $this->offsetExists($offset)) {
            return new UnknownOffsetException($this, $offset);
        }

        return parent::offsetGet($offset);
    }
}