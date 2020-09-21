<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Leshkens\OrchidHelpHintLayout\Http\Requests\SaveHelpHintRequest;

/**
 * Class HelpHintService
 *
 * @package Leshkens\OrchidHelpHintLayout\Services
 */
class HelpHintService
{
    /**
     * @var Builder
     */
    public $model;

    /**
     * HelpHintService constructor.
     */
    public function __construct()
    {
        $this->model = app(ModelHandler::class)->getModel();
    }

    /**
     * @param string|null         $id
     * @param SaveHelpHintRequest $request
     */
    public function save(?string $id, SaveHelpHintRequest $request): void
    {
        $hint = $this->model->findOrNew($id);

        $hint->fill($request->get('hint'))->save();
    }

    /**
     * @param string $id
     *
     * @throws \Exception
     */
    public function delete(string $id): void
    {
        $this->model->find($id)->delete();
    }

    /**
     * @param string|null $id
     *
     * @return Model|null
     */
    public function findOrFail(?string $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param string|null $exception
     *
     * @return array
     */
    public static function getAvailableSlugs(?string $exception = null): array
    {
        $hints = config('platform-hints.hints_map');

        foreach ($hints as $slug => $title) {
            $hints[$slug] = __($title);
        }

        $slugs = (new static)->model->pluck('slug')->toArray();

        foreach ($slugs as $slug) {
            if ($exception !== $slug) {
                unset($hints[$slug]);
            }
        }

        return $hints;
    }

    /**
     * @param string $slug
     *
     * @return Model|null
     */
    public static function getBySlug(string $slug): ?Model
    {
        return (new static)->model
            ->whereSlug($slug)
            ->whereIsVisible(true)
            ->first();
    }
}
