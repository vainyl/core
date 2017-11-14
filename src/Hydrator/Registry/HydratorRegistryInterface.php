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
 * Class HydratorRegistryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 * @author Andrii Dembitskiy <andrew.dembitskiy@gmail.com>
 */
interface HydratorRegistryInterface extends IdentifiableInterface
{
    /**
     * @param string $alias
     * @param string $containerAlias
     *
     * @return HydratorRegistryInterface
     */
    public function addHydrator(string $alias, string $containerAlias): HydratorRegistryInterface;

    /**
     * @param string $alias
     * @param string $containerAlias
     *
     * @return HydratorRegistryInterface
     */
    public function addDefaultHydrator(string $alias, string $containerAlias): HydratorRegistryInterface;

    /**
     * @param string $alias
     *
     * @return HydratorInterface
     */
    public function getHydrator(string $alias): HydratorInterface;
}
