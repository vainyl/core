<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types = 1);
namespace Vainyl\Core\Result;

use Vainyl\Core\Id\AbstractIdentifiable;

/**
 * Class AbstractFailedResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractFailedResult extends AbstractIdentifiable implements ResultInterface
{
    /**
     * @inheritDoc
     */
    public function isSuccessful()
    {
        return false;
    }
}
