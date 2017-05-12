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

namespace Vainyl\Core\Encoder\Storage;

use Vainyl\Core\Encoder\DecoderInterface;
use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;

/**
 * Class DecoderStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DecoderStorage extends AbstractStorageDecorator implements DecoderStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getDecoder(string $alias): DecoderInterface
    {
        return $this->offsetGet($alias);
    }

    /**
     * @inheritDoc
     */
    public function addDecoder(string $alias, DecoderInterface $decoder): DecoderStorageInterface
    {
        $this->offsetSet($alias, $decoder);

        return $this;
    }
}