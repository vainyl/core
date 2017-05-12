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

namespace Vainyl\Core\Exception;

use Vainyl\Core\Encoder\EncoderInterface;

/**
 * Interface EncoderExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EncoderExceptionInterface extends \Throwable
{
    /**
     * @return EncoderInterface
     */
    public function getEncoder() : EncoderInterface;
}