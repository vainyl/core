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
namespace Vainyl\Core\Result;

use Vainyl\Core\ArrayX\ArrayInterface;
use Vainyl\Core\String\StringInterface;

/**
 * Interface ResultInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ResultInterface extends ArrayInterface, StringInterface
{
    /**
     * @return bool
     */
    public function isSuccessful();
}
