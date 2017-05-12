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

use Vainyl\Core\Encoder\EncoderInterface;
use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;

/**
 * Class EncoderStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EncoderStorage extends AbstractStorageDecorator implements EncoderStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getEncoder(string $alias): EncoderInterface
    {
        return $this->offsetGet($alias);
    }

    /**
     * @inheritDoc
     */
    public function addEncoder(string $alias, EncoderInterface $encoder): EncoderStorageInterface
    {
        $this->offsetSet($alias, $encoder);

        return $this;
    }
}