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

use Symfony\Component\DependencyInjection\Container;

/**
 * Class MissingTagFieldException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MissingRequiredFieldException extends AbstractContainerException
{
    private $service;

    private $section;

    private $field;

    /**
     * MissingTagFieldException constructor.
     *
     * @param Container $container
     * @param string    $node
     * @param array     $section
     * @param string    $field
     */
    public function __construct(Container $container, $node, array $section, string $field)
    {
        $this->service = $node;
        $this->section = $section;
        $this->field = $field;
        parent::__construct(
            $container,
            sprintf(
                'Section %s for node %s does not contain required field %s',
                json_encode($section),
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
            ['service' => $this->service, 'section' => $this->section, 'field' => $this->field],
            parent::toArray()
        );
    }
}
