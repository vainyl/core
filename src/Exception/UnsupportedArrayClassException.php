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

use Vainyl\Core\Renderer\Factory\ArrayFactoryInterface;

/**
 * Class UnsupportedArrayClassException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedArrayClassException extends AbstractArrayFactoryException
{
    private $class;

    /**
     * UnsupportedArrayClassException constructor.
     *
     * @param ArrayFactoryInterface $factory
     * @param string                $class
     */
    public function __construct(ArrayFactoryInterface $factory, string $class)
    {
        $this->class = $class;
        parent::__construct($factory, sprintf('Array %s is not supported', $class));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['class' => $this->class], parent::toArray());
    }
}