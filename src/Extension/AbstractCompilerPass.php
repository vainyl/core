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
namespace Vainyl\Core\Extension;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\NameableInterface;

/**
 * Class AbstractCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractCompilerPass extends AbstractIdentifiable implements CompilerPassInterface, NameableInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return basename(get_class($this));
    }
}
