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

namespace Vainyl\Core\Application;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Vainyl\Core\ArrayInterface;
use Vainyl\Core\Extension\AbstractExtension;
use Vainyl\Core\StringInterface;

/**
 * Interface EnvironmentInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EnvironmentInterface extends ArrayInterface, StringInterface
{
    /**
     * @return bool
     */
    public function isDebugEnabled() : bool;

    /**
     * @return bool
     */
    public function isCachingEnabled() : bool;

    /**
     * @return string
     */
    public function getApplicationDirectory() : string;

    /**
     * @return string
     */
    public function getConfigDirectory() : string;

    /**
     * @return string
     */
    public function getDebugDirectory() : string;

    /**
     * @return string
     */
    public function getCacheDirectory() : string;

    /**
     * @return string
     */
    public function getContainerConfig() : string;

    /**
     * @return AbstractExtension[]
     */
    public function getExtensions() : array;

    /**
     * @return CompilerPassInterface[]
     */
    public function getCompilerPasses() : array;
}