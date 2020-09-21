<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Http\Requests;

use Leshkens\OrchidHelpHintLayout\Services\HelpHintService;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Leshkens\OrchidHelpHintLayout\Support\Color;

/**
 * Class SaveHelpHintRequest
 *
 * @package Leshkens\OrchidHelpHintLayout\Http\Requests
 */
class SaveHelpHintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules(HelpHintService $service)
    {
        $model = $service->model;

        return [
            'hint.slug' => [
                'required',
                Rule::unique(get_class($model), 'slug')
                    ->ignore($this->route('help_hint')),
            ],
            'hint.type' => [
                'required',
                Rule::in(Color::getTypes()),
            ],
            'hint.heading'    => 'string|nullable',
            'hint.is_visible' => 'required|boolean',
            'hint.content'    => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'hint.slug.required'    => __('A unique name is required'),
            'hint.slug.unique'      => __('This hint already exists'),
            'hint.content.required' => __('Fill in the content'),
        ];
    }
}
