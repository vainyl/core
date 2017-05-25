<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Operation
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Core\Composite;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Core\ResultInterface;

/**
 * Class CompositeResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CompositeResult extends AbstractIdentifiable implements ResultInterface
{
    private $status;

    private $results;

    /**
     * CompositeResult constructor.
     *
     * @param bool              $status
     * @param ResultInterface[] $results
     */
    public function __construct(bool $status, array $results)
    {
        $this->status = $status;
        $this->results = $results;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $results = [];
        foreach ($this->results as $result) {
            $results[] = $result->toArray();
        }

        return ['results' => $results];
    }

    /**
     * @inheritDoc
     */
    public function isSuccessful()
    {
        return $this->status;
    }
}