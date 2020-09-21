<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Services;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelHandler
 *
 * @package Leshkens\OrchidHelpHintLayout\Services
 */
class ModelHandler
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * HelpHintService constructor.
     *
     * @param string $class
     */
    public function __construct(string $class)
    {
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
