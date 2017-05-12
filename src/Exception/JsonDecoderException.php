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
 * Class JsonEncoderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class JsonDecoderException extends AbstractDecoderException
{
    private $data;

    private $error;

    private $message;

    /**
     * JsonEncoderException constructor.
     *
     * @param DecoderInterface $decoder
     * @param int              $error
     * @param string           $message
     * @param mixed            $data
     */
    public function __construct(DecoderInterface $decoder, int $error, string $message, $data)
    {
        $this->data = $data;
        $this->error = $error;
        $this->message = $message;
        parent::__construct(
            $decoder,
            sprintf(
                'Cannot decode data %s with json: %d [%s',
                var_export($data, true),
                $error,
                $message
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(
            ['data' => $this->data, 'error' => $this->error, 'message' => $this->message],
            parent::toArray()
        );
    }
}