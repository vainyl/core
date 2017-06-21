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

/**
 * Class AbstractBundleExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractBundleExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function getDirectory(): string
    {
        return dirname((new \ReflectionClass(get_class($this)))->getFileName()) . DIRECTORY_SEPARATOR . '..';
    }

    /**
     * @inheritDoc
     */
    public function getConfigDirectory(): string
    {
        if ($this->getEnvironment()->isDebugEnabled()) {
            return $this->getDirectory() . DIRECTORY_SEPARATOR . 'config';
        }

        return $this->getDirectory() . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'debug';
    }
}