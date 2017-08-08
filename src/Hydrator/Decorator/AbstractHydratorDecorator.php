<?php
/**
 * Mmjitsu
 *
 * PHP Version 7.1
 *
 * @package   Api
 * @link      https://mmjitsu.com
 */
declare(strict_types=1);

namespace Vainyl\Core\Hydrator\Decorator;

use Vainyl\Core\Hydrator\HydratorInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Class AbstractHydratorDecorator
 *
 * @author  Andrey Dembitskiy <andrew.dembitskiy@gmail.com>
 *
 * @package Vainyl\Core\Hydrator\Decorator
 */
abstract class AbstractHydratorDecorator implements HydratorInterface
{
    private $hydrator;

    /**
     * AbstractHydratorDecorator constructor.
     *
     * @param HydratorInterface $hydrator
     */
    public function __construct(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @inheritDoc
     */
    public function supports(string $className): bool
    {
        return $this->hydrator->supports($className);
    }

    /**
     * @inheritDoc
     */
    public function create(string $className, array $data): IdentifiableInterface
    {
        return $this->hydrator->create($className, $data);
    }

    /**
     * @inheritDoc
     */
    public function update($object, array $data): IdentifiableInterface
    {
        return $this->hydrator->update($object, $data);
    }

    /**
     * @inheritDoc
     */
    public function getId(): ?string
    {
        return $this->hydrator->getId();
    }
}
