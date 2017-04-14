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

use Vainyl\Core\Application\ApplicationInterface;

/**
 * Class AbstractApplicationException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApplicationException extends AbstractCoreException implements ApplicationExceptionInterface
{
    private $application;

    /**
     * AbstractApplicationException constructor.
     *
     * @param ApplicationInterface $application
     * @param string               $message
     * @param int                  $code
     * @param \Exception|null      $previous
     */
    public function __construct(
        ApplicationInterface $application,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->application = $application;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getApplication(): ApplicationInterface
    {
        return $this->application;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['application' => $this->application->getName()], parent::toArray());
    }
}