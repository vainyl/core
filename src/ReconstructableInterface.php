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

namespace Vainyl\Core;

/**
 * Interface ReconstructableInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ReconstructableInterface extends IdentifiableInterface, \JsonSerializable
{
    /**
     * @param array $data
     *
     * @return ReconstructableInterface
     */
    public function fromArray(array $data): ReconstructableInterface;
}