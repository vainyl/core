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

use Vainyl\Core\Comparator\ComparatorInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Class AbstractComparatorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractComparatorException extends AbstractCoreException implements ComparatorExceptionInterface
{
    private $comparator;

    private $what;

    private $to;

    /**
     * AbstractComparatorException constructor.
     *
     * @param ComparatorInterface   $comparator
     * @param IdentifiableInterface $what
     * @param IdentifiableInterface $to
     * @param string                $message
     * @param int                   $code
     * @param \Throwable|null       $previous
     */
    public function __construct(
        ComparatorInterface $comparator,
        IdentifiableInterface $what,
        IdentifiableInterface $to,
        string $message,
        int $code = 500,
        \Throwable $previous = null
    ) {
        $this->comparator = $comparator;
        $this->what = $what;
        $this->to = $to;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getComparator(): ComparatorInterface
    {
        return $this->comparator;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(
            [
                'comparator' => $this->comparator->getName(),
                'what'       => get_class($this->what),
                'to'         => get_class($this->to),
            ],
            parent::toArray()
        );
    }
}
