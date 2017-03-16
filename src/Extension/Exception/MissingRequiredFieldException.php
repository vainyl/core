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
class MissingRequiredFieldException extends AbstractCompilerPassException
{
    private $service;

    private $tag;

    private $field;

    /**
     * MissingTagFieldException constructor.
     *
     * @param AbstractCompilerPass $compilerPass
     * @param string               $node
     * @param array                $tag
     * @param string               $field
     */
    public function __construct(AbstractCompilerPass $compilerPass, $node, array $tag, string $field)
    {
        $this->service = $node;
        $this->tag = $tag;
        $this->field = $field;
        parent::__construct(
            $compilerPass,
            sprintf(
                'Section %s for node %s does not contain required field %s',
                json_encode($tag),
                $node,
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
