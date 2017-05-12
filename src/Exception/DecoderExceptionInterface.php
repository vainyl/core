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

use Vainyl\Core\Encoder\DecoderInterface;

/**
 * Interface DecoderExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DecoderExceptionInterface extends \Throwable
{
    /**
     * @return DecoderInterface
     */
    public function getDecoder() :  DecoderInterface;
}