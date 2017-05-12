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
 * Class AbstractDecoderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDecoderException extends AbstractCoreException implements DecoderExceptionInterface
{
    private $decoder;

    /**
     * AbstractDecoderException constructor.
     *
     * @param DecoderInterface $decoder
     * @param string           $message
     * @param int              $code
     * @param \Exception|null  $previous
     */
    public function __construct(
        DecoderInterface $decoder,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->decoder = $decoder;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getDecoder(): DecoderInterface
    {
        return $this->decoder;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['decoder' => $this->decoder->getName()], parent::toArray());
    }
}