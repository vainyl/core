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

use Vainyl\Core\Extension\AbstractCompilerPass;

/**
 * Class MissingTagFieldException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MissingTagFieldException extends AbstractCompilerPassException
{
    private $service;

    private $tag;

    private $field;

    /**
     * MissingTagFieldException constructor.
     *
     * @param AbstractCompilerPass $compilerPass
     * @param string               $service
     * @param array                $tag
     * @param string               $field
     */
    public function __construct(AbstractCompilerPass $compilerPass, $service, array $tag, string $field)
    {
        $this->service = $service;
        $this->tag = $tag;
        $this->field = $field;
        parent::__construct(
            $compilerPass,
            sprintf(
                'Tag %s for service %s does not contain required field %s',
                json_encode($tag),
                $service,
                $field
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(
            ['service' => $this->service, 'tag' => $this->tag, 'field' => $this->field],
            parent::toArray()
        );
    }
}
