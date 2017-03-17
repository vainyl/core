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
declare(strict_types = 1);
namespace Vainyl\Core\Id;

/**
 * Class AbstractIdentifiable
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractIdentifiable implements IdentifiableInterface
{
    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return spl_object_hash($this);
    }
}