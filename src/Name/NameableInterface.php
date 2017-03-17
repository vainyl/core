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
namespace Vainyl\Core\Name;

use Vainyl\Core\Id\IdentifiableInterface;

/**
 * Interface NameableInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface NameableInterface extends IdentifiableInterface
{
    /**
     * @return string
     */
    public function getName() : string;
}
