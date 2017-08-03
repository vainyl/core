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
 * Interface EncoderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EncoderInterface extends NameableInterface
{
    /**
     * @param mixed $data
     *
     * @return string
     */
    public function encode($data): string;
}