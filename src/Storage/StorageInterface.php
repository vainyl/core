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

namespace Vainyl\Core\Storage;

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Interface StorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface StorageInterface extends IdentifiableInterface, ArrayInterface, \ArrayAccess, \Countable, \IteratorAggregate
{
}