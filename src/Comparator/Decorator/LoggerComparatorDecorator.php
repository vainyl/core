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
declare(strict_types = 1);
namespace Vainyl\Core\Comparator\Decorator;

use Psr\Log\LoggerInterface;
use Vainyl\Core\Comparator\ComparableInterface;
use Vainyl\Core\Comparator\ComparatorInterface;

/**
 * Class LoggerComparatorDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerComparatorDecorator extends AbstractComparatorDecorator
{
    private $logger;

    /**
     * LoggerComparatorDecorator constructor.
     *
     * @param ComparatorInterface $comparator
     * @param LoggerInterface     $logger
     */
    public function __construct(ComparatorInterface $comparator, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($comparator);
    }

    /**
     * @inheritDoc
     */
    public function eq(ComparableInterface $what, ComparableInterface $to): bool
    {
        $this->logger->debug(
            sprintf(
                'Trying to compare whether objects %s and %s are equal with comparator %s',
                $what->getId(),
                $to->getId(),
                $this->getName()
            )
        );
        $result = parent::eq($what, $to);
        if ($result) {
            $this->logger->debug(
                sprintf(
                    'Objects %s and %s are equal according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        } else {
            $this->logger->debug(
                sprintf(
                    'Objects %s and %s are not equal according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function neq(ComparableInterface $what, ComparableInterface $to): bool
    {
        $this->logger->debug(
            sprintf(
                'Trying to compare whether objects %s and %s are not equal with comparator %s',
                $what->getId(),
                $to->getId(),
                $this->getName()
            )
        );
        $result = parent::neq($what, $to);
        if ($result) {
            $this->logger->debug(
                sprintf(
                    'Objects %s and %s are not equal according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        } else {
            $this->logger->debug(
                sprintf(
                    'Objects %s and %s are equal according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function lt(ComparableInterface $what, ComparableInterface $to): bool
    {
        $this->logger->debug(
            sprintf(
                'Trying to compare whether object %s is less than %s with comparator %s',
                $what->getId(),
                $to->getId(),
                $this->getName()
            )
        );
        $result = parent::lt($what, $to);
        if ($result) {
            $this->logger->debug(
                sprintf(
                    'Object %s is less than %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        } else {
            $this->logger->debug(
                sprintf(
                    'Object %s is not less than %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function gt(ComparableInterface $what, ComparableInterface $to): bool
    {
        $this->logger->debug(
            sprintf(
                'Trying to compare whether object %s is greater than %s with comparator %s',
                $what->getId(),
                $to->getId(),
                $this->getName()
            )
        );
        $result = parent::gt($what, $to);
        if ($result) {
            $this->logger->debug(
                sprintf(
                    'Object %s is greater than %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        } else {
            $this->logger->debug(
                sprintf(
                    'Object %s is not greater than %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function lte(ComparableInterface $what, ComparableInterface $to): bool
    {
        $this->logger->debug(
            sprintf(
                'Trying to compare whether object %s is less or equal than %s with comparator %s',
                $what->getId(),
                $to->getId(),
                $this->getName()
            )
        );
        $result = parent::lte($what, $to);
        if ($result) {
            $this->logger->debug(
                sprintf(
                    'Object %s is less or equal than %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        } else {
            $this->logger->debug(
                sprintf(
                    'Object %s is not less or equal than %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function gte(ComparableInterface $what, ComparableInterface $to): bool
    {
        $this->logger->debug(
            sprintf(
                'Trying to compare whether object %s is greater or equal than %s with comparator %s',
                $what->getId(),
                $to->getId(),
                $this->getName()
            )
        );
        $result = parent::gte($what, $to);
        if ($result) {
            $this->logger->debug(
                sprintf(
                    'Object %s is greater or equal than %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        } else {
            $this->logger->debug(
                sprintf(
                    'Object %s is not greater or equal than %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function like(ComparableInterface $what, ComparableInterface $to): bool
    {
        $this->logger->debug(
            sprintf(
                'Trying to compare whether object %s is like %s with comparator %s',
                $what->getId(),
                $to->getId(),
                $this->getName()
            )
        );
        $result = parent::like($what, $to);
        if ($result) {
            $this->logger->debug(
                sprintf(
                    'Object %s is like %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        } else {
            $this->logger->debug(
                sprintf(
                    'Object %s is not like %s according to comparator %s',
                    $what->getId(),
                    $to->getId(),
                    $this->getName()
                )
            );
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function compare(ComparableInterface $what, ComparableInterface $to): int
    {
        $this->logger->debug(
            sprintf(
                'Trying to compare object %s to %s with comparator %s',
                $what->getId(),
                $to->getId(),
                $this->getName()
            )
        );
        $result = parent::compare($what, $to);
        switch ($result) {
            case self::RESULT_LESS:
                $this->logger->debug(
                    sprintf(
                        'Object %s is less than %s according to comparator %s',
                        $what->getId(),
                        $to->getId(),
                        $this->getName()
                    )
                );
                break;
            case self::RESULT_EQUAL:
                $this->logger->debug(
                    sprintf(
                        'Object %s is equal to %s according to comparator %s',
                        $what->getId(),
                        $to->getId(),
                        $this->getName()
                    )
                );
                break;
            case self::RESULT_GREATER:
                $this->logger->debug(
                    sprintf(
                        'Object %s is greater than %s according to comparator %s',
                        $what->getId(),
                        $to->getId(),
                        $this->getName()
                    )
                );
                break;

        }

        return $result;
    }
}
