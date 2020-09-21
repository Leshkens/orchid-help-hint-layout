<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Http\Screens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Leshkens\OrchidHelpHintLayout\Http\Layouts\HelpHintEditLayout;
use Leshkens\OrchidHelpHintLayout\Http\Requests\SaveHelpHintRequest;
use Leshkens\OrchidHelpHintLayout\Services\HelpHintService;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

/**
 * Class HelpHintEditScreen
 *
 * @package Leshkens\OrchidHelpHintLayout\Http\Screens
 */
class HelpHintEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Creation hint';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Fill in the required fields';

    /**
     * Permission.
     *
     * @var string
     */
    public $permission = 'platform.systems.help-hints';

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param string|null     $hintId
     * @param HelpHintService $service
     *
     * @return array
     */
    public function query(?string $hintId, HelpHintService $service): array
    {
        $hint = $this->model = !is_null($hintId)
            ? $service->findOrFail($hintId)
            : $service->model;

        if ($hint->exists) {
            $this->name = 'Editing hint';
            $this->description = 'Change the required fields';
        }

        return [
            'hint' => $hint
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make(__('Delete'))
                ->icon('trash')
                ->confirm(__('Are you sure?'))
                ->novalidate()
                ->canSee($this->model->exists)
                ->method('delete'),

            Button::make(__('Save'))
                ->icon('save')
                ->method('save')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            HelpHintEditLayout::class
        ];
    }

    /**
     * @param string|null         $hintId
     * @param HelpHintService     $service
     * @param SaveHelpHintRequest $request
     *
     * @return RedirectResponse
     */
    public function save(?string $hintId, HelpHintService $service, SaveHelpHintRequest $request): RedirectResponse
    {

        $service->save($hintId, $request);

        Toast::success(__('Hint was saved'));

        return redirect()->route('platform.systems.help-hints');
    }

    /**
     * @param string|null     $hintId
     * @param HelpHintService $service
     *
     * @return RedirectResponse
     * @throws \Exception
     */
    public function delete(?string $hintId, HelpHintService $service): RedirectResponse
    {
        if (!is_null($hintId)) {
            $service->delete($hintId);

            Toast::success(__('Hint was deleted'));
        }

        return redirect()->route('platform.systems.help-hints');
    }
}
