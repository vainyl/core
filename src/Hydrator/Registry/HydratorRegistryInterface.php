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

namespace Vainyl\Core\Hydrator\Registry;

use Vainyl\Core\Hydrator\HydratorInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Class HydratorRegistry
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HydratorRegistryInterface extends IdentifiableInterface
{
    /**
     * @param string $alias
     * @param string $containerAlias
     *
     * @return HydratorRegistry
     */
    public function addHydrator(string $alias, string $containerAlias): HydratorRegistry;

    /**
     * @param string $alias
     *
     * @return HydratorInterface
     */
    public function getHydrator(string $alias): HydratorInterface;
}