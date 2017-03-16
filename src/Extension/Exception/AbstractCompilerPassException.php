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
use Vainyl\Core\Extension\AbstractCompilerPass;

/**
 * Class AbstractCompilerPassException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractCompilerPassException extends AbstractCoreException
{
    private $compilerPass;

    /**
     * AbstractCompilerPassException constructor.
     *
     * @param AbstractCompilerPass $compilerPass
     * @param string               $message
     * @param int                  $code
     * @param \Exception|null      $previous
     */
    public function __construct(
        AbstractCompilerPass $compilerPass,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->compilerPass = $compilerPass;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['compiler_pass' => $this->compilerPass->getName()], parent::toArray());
    }

}