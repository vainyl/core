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

use Vainyl\Core\Hydrator\HydratorInterface;

/**
 * Class UnsupportedClassHydratorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedClassHydratorException extends AbstractHydratorException
{
    private $class;

    /**
     * UnsupportedClassHydratorException constructor.
     *
     * @param HydratorInterface $hydrator
     * @param string            $class
     */
    public function __construct(HydratorInterface $hydrator, string $class)
    {
        $this->class = $class;
        parent::__construct($hydrator, sprintf('Cannot hydrate unsupported class %s'));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['class' => $this->class], parent::toArray());
    }
}