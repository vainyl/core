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
use Vainyl\Core\Exception\JsonDecoderException;

/**
 * Class JsonEncoder
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class JsonEncoder extends AbstractIdentifiable implements EncoderInterface, DecoderInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'json';
    }

    /**
     * @inheritDoc
     */
    public function decode(string $data)
    {
        $decoded = json_decode($data, true);
        if (0 !== ($error = json_last_error())) {
            $message = json_last_error_msg();
            json_encode(null);
            throw new JsonDecoderException($this, $error, $message, $data);
        }

        return $decoded;
    }

    /**
     * @inheritDoc
     */
    public function encode($data): string
    {
        $encoded = json_encode($data);
        if (0 !== ($error = json_last_error())) {
            $message = json_last_error_msg();
            json_encode(null);
            throw new JsonDecoderException($this, $error, $message, $data);
        }

        return $encoded;
    }
}