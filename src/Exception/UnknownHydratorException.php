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
 * Class UnknownHydratorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownHydratorException extends AbstractHydratorRegistryException
{
    private $alias;

    /**
     * UnknownHydratorException constructor.
     *
     * @param HydratorRegistryInterface $registry
     * @param string                    $alias
     */
    public function __construct(HydratorRegistryInterface $registry, string $alias)
    {
        parent::__construct($registry, sprintf('No hydrator is registered by the alias %s', $alias));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['alias' => $this->alias], parent::toArray());
    }
}