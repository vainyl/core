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

use Vainyl\Core\Encoder\DecoderInterface;
use Vainyl\Core\Storage\StorageInterface;

/**
 * Interface DecoderStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DecoderStorageInterface extends StorageInterface
{
    /**
     * @param string $alias
     *
     * @return DecoderInterface
     */
    public function getDecoder(string $alias) : DecoderInterface;

    /**
     * @param string           $alias
     * @param DecoderInterface $decoder
     *
     * @return DecoderStorageInterface
     */
    public function addDecoder(string $alias, DecoderInterface $decoder) : DecoderStorageInterface;
}