<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\Extension\Exception;

use Vainyl\Core\Exception\AbstractCoreException;
use Vainyl\Core\Extension\AbstractExtension;

/**
 * Class AbstractExtensionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractExtensionException extends AbstractCoreException
{
    private $extension;

    /**
     * AbstractExtensionException constructor.
     *
     * @param AbstractExtension $extension
     * @param string            $message
     * @param int               $code
     * @param \Exception|null   $previous
     */
    public function __construct(
        AbstractExtension $extension,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->extension = $extension;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['extension' => $this->extension], parent::toArray());
    }
}