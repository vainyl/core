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

use Vainyl\Core\AbstractIdentifiable;

/**
 * Class NullEncoder
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NullEncoder extends AbstractIdentifiable implements EncoderInterface, DecoderInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'null';
    }

    /**
     * @inheritDoc
     */
    public function decode(string $data)
    {
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function encode($data): string
    {
        return var_export($data, true);
    }
}