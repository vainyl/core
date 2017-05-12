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
 * Class JsonEncoderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class JsonEncoderException extends AbstractEncoderException
{
    private $data;

    private $error;

    private $message;

    /**
     * JsonEncoderException constructor.
     *
     * @param EncoderInterface $encoder
     * @param int              $error
     * @param string           $message
     * @param mixed            $data
     */
    public function __construct(EncoderInterface $encoder, int $error, string $message, $data)
    {
        $this->data = $data;
        $this->error = $error;
        $this->message = $message;
        parent::__construct(
            $encoder,
            sprintf(
                'Cannot encode data %s with json: %d [%s',
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