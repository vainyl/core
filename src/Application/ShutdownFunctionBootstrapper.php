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

namespace Vainyl\Core\Application;

use Psr\Log\LoggerInterface;
use Vainyl\Core\AbstractIdentifiable;

/**
 * Class ShutdownFunctionBootstrapper
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ShutdownFunctionBootstrapper extends AbstractIdentifiable implements BootstrapperInterface
{
    const ERROR_LEVEL_MAP
        = [
            E_ERROR             => 600,
            E_CORE_ERROR        => 600,
            E_COMPILE_ERROR     => 600,
            E_USER_ERROR        => 600,
            E_PARSE             => 600,
            E_RECOVERABLE_ERROR => 600,
            E_WARNING           => 500,
            E_CORE_WARNING      => 500,
            E_COMPILE_WARNING   => 500,
            E_USER_WARNING      => 500,
            E_NOTICE            => 400,
            E_USER_NOTICE       => 400,
            E_DEPRECATED        => 400,
            E_USER_DEPRECATED   => 400,
            E_STRICT            => 400,
        ];

    private $logger;

    /**
     * ShutdownFunctionBootstrapper constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'error_logger';
    }

    /**
     * @inheritDoc
     */
    public function process(ApplicationInterface $application): BootstrapperInterface
    {
        register_shutdown_function(
            function () {
                if (!is_null($error = error_get_last())) {
                    $this->logger->log(self::ERROR_LEVEL_MAP[$error['type']], $error['message']);
                }
            }
        );

        return $this;
    }
}