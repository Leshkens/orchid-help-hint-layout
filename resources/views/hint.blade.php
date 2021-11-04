




<div class="col-md">
    <fieldset class="mb-3">

        @if(!is_null($hint->heading))
            <div class="col p-0 px-3">
                <legend class="text-black">
                    {{ $hint->heading }}
                </legend>
            </div>
        @endif

        <div class="@if($hint->type !== 'none')bg-{{ $hint->type }} shadow-sm @endif rounded p-4 py-4 d-flex flex-column position-relative">

            @if (Auth::user()->hasAccess('platform.systems.help-hints'))
                <a href="{{ route('platform.systems.help-hints.edit', $hint->id) }}"
                   title="{{ __('Edit') }}"
                   class="position-absolute top-0 start-100 translate-middle badge border border-white rounded-circle bg-white color-black p-1">
                    <x-orchid-icon path="settings"
                                   class="icon-big"
                                   fill="black"
                                   width="1.8em"
                                   height="1.8em" />
                </a>
            @endif
            {!! $hint->content !!}
        </div>
    </fieldset>

</div>
