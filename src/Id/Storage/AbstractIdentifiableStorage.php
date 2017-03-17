<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\Id\Storage;

use Vainyl\Core\Id\IdentifiableInterface;
use Vainyl\Core\Storage\AbstractStorage;

/**
 * Class AbstractIdentifiableStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractIdentifiableStorage extends AbstractStorage
{
    private $instances = [];

    /**
     * @param string                $alias
     * @param IdentifiableInterface $identifiable
     *
     * @return AbstractIdentifiableStorage
     */
    public function addInstance(string $alias, IdentifiableInterface $identifiable): AbstractIdentifiableStorage
    {
        if ($this->offsetExists($alias)) {
        }

        $this->instances[$alias] = $identifiable;

        return $this;
    }
}