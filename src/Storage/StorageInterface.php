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
namespace Vainyl\Core\Storage;

use Vainyl\Core\Id\IdentifiableInterface;
use Vainyl\Core\Name\NameableInterface;

/**
 * Interface StorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface StorageInterface extends IdentifiableInterface, NameableInterface, \ArrayAccess
{
}