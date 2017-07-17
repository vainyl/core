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

namespace Vainyl\Core;

/**
 * Class AbstractSuccessfulResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSuccessfulResult extends AbstractIdentifiable implements ResultInterface
{
    /**
     * @inheritDoc
     */
    public function isSuccessful()
    {
        return true;
    }



    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return ['status' => false];
    }
}
