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

namespace Vainyl\Core\Encoder;

use Vainyl\Core\NameableInterface;

/**
 * Interface DecoderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DecoderInterface extends NameableInterface
{
    /**
     * @param string $data
     *
     * @return mixed
     */
    public function decode(string $data);
}