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

use Ds\Hashable;

/**
 * Interface Identifiable
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface IdentifiableInterface extends Hashable
{
    /**
     * @return string
     */
    public function getId(): ?string;
}
