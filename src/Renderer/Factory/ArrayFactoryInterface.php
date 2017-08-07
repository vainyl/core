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

namespace Vainyl\Core\Renderer\Factory;

use Vainyl\Core\ArrayInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Interface ArrayFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ArrayFactoryInterface extends IdentifiableInterface
{
    /**
     * @param string $name
     *
     * @return bool
     */
    public function supports(string $name): bool;

    /**
     * @param string $name
     * @param array  $data
     *
     * @return ArrayInterface
     */
    public function create(string $name, array $data = []): ArrayInterface;
}