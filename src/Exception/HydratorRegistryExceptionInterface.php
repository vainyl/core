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

namespace Vainyl\Core\Exception;

use Vainyl\Core\Hydrator\Registry\HydratorRegistryInterface;

/**
 * Class HydratorRegistryExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HydratorRegistryExceptionInterface extends \Throwable
{
    /**
     * @return HydratorRegistryInterface
     */
    public function getRegistry(): HydratorRegistryInterface;
}