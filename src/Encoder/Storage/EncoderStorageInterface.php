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

namespace Vainyl\Core\Encoder\Storage;

use Vainyl\Core\Encoder\EncoderInterface;
use Vainyl\Core\IdentifiableInterface;

/**
 * Class EncoderStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EncoderStorageInterface extends IdentifiableInterface
{
    /**
     * @param string $alias
     *
     * @return EncoderInterface
     */
    public function getEncoder(string $alias): EncoderInterface;

    /**
     * @param string           $alias
     * @param EncoderInterface $encoder
     *
     * @return EncoderStorageInterface
     */
    public function addEncoder(string $alias, EncoderInterface $encoder): EncoderStorageInterface;
}