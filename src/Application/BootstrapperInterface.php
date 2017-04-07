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

namespace Vainyl\Core\Application;

use Vainyl\Core\NameableInterface;

/**
 * Interface BootstrapperInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface BootstrapperInterface extends NameableInterface
{
    /**
     * @param ApplicationInterface $application
     *
     * @return BootstrapperInterface
     */
    public function process(ApplicationInterface $application) : BootstrapperInterface;
}