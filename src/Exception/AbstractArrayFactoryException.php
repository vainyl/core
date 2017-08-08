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
 * Class AbstractArrayFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractArrayFactoryException extends AbstractCoreException implements ArrayFactoryExceptionInterface
{
    private $factory;

    /**
     * AbstractArrayFactoryException constructor.
     *
     * @param ArrayFactoryInterface $factory
     * @param string                $message
     * @param int                   $code
     * @param \Exception|null       $previous
     */
    public function __construct(
        ArrayFactoryInterface $factory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->factory = $factory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getFactory(): ArrayFactoryInterface
    {
        return $this->factory;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['factory' => $this->factory->getId()], parent::toArray());
    }
}