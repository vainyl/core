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
 * Class AbstractEncoderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEncoderException extends AbstractCoreException implements EncoderExceptionInterface
{
    private $encoder;

    /**
     * AbstractEncoderException constructor.
     *
     * @param EncoderInterface $encoder
     * @param string           $message
     * @param int              $code
     * @param \Exception|null  $previous
     */
    public function __construct(
        EncoderInterface $encoder,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->encoder = $encoder;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getEncoder(): EncoderInterface
    {
        return $this->encoder;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['encoder' => $this->encoder->getName()], parent::toArray());
    }
}