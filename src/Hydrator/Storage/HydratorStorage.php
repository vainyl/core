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

namespace Vainyl\Core\Hydrator\Storage;

use Vainyl\Core\Hydrator\HydratorInterface;
use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;

/**
 * Class HydratorStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HydratorStorage extends AbstractStorageDecorator implements HydratorStorageInterface
{
    /**
     * @inheritDoc
     */
    public function addHydrator(string $alias, HydratorInterface $hydrator): HydratorStorageInterface
    {
        $this->offsetSet($alias, $hydrator);

        return $this;
    }
}