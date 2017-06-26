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

namespace Vainyl\Core\Extension;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Vainyl\Core\Application\EnvironmentInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Interface ExtensionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ExtensionInterface extends IdentifiableInterface
{
    /**
     * @return EnvironmentInterface
     */
    public function getEnvironment(): EnvironmentInterface;

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getNamespace();

    /**
     * @return string
     */
    public function getDirectory(): string;

    /**
     * @return string
     */
    public function getConfigDirectory(): string;

    /**
     * @return CompilerPassInterface[]
     */
    public function getCompilerPasses(): array;
}