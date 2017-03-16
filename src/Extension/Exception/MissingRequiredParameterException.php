<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);

namespace Vainyl\Core\Extension\Exception;

use Symfony\Component\DependencyInjection\Container;

/**
 * Class MissingRequiredParameterException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MissingRequiredParameterException extends AbstractContainerException
{
    private $parameter;

    /**
     * MissingRequiredParameterException constructor.
     *
     * @param Container $container
     * @param string    $parameter
     */
    public function __construct(Container $container, string $parameter)
    {
        $this->parameter = $parameter;
        parent::__construct($container, sprintf('Required parameter %s is missing from container', $parameter));
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['parameter' => $this->parameter], parent::toArray());
    }
}