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

namespace Vainyl\Core\Extension\Exception;

use Symfony\Component\DependencyInjection\Container;

/**
 * Class MissingRequiredServiceException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MissingRequiredServiceException extends AbstractContainerException
{
    private $service;

    /**
     * MissingRequiredServiceException constructor.
     *
     * @param Container $container
     * @param string    $service
     */
    public function __construct(Container $container, string $service)
    {
        $this->service = $service;
        parent::__construct($container, sprintf('Required service %s is missing from container', $service));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['service' => $this->service], parent::toArray());
    }
}