<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Services;

use Illuminate\Database\Eloquent\Model;
use Leshkens\OrchidHelpHintLayout\Models\HelpHint;

/**
 * Class ModelHandler
 *
 * @package Leshkens\OrchidHelpHintLayout\Services
 */
class ModelService
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * HelpHintService constructor.
     *
     * @param string|null $class
     */
    public function __construct(?string $class)
    {
        if (is_null($class)) {
            $class = HelpHint::class;
        }

        $this->model = new $class;
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }
}
