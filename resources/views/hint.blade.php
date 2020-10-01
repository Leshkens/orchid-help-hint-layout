<div class="mb-3">
    @if(!is_null($hint->heading))
        <div class="col p-0 px-3">
            <legend class="text-black">
                {{ $hint->heading }}
            </legend>
        </div>
    @endif
    <div class="rounded bg-white shadow-sm mb-3">
        <div class="alert @if($hint->type !== 'none')alert-{{ $hint->type }}@endif rounded mb-0"
             role="alert">
            @if (Auth::user()->hasAccess('platform.systems.help-hints'))
                <a href="{{ route('platform.systems.help-hints.edit', $hint->id) }}"
                   title="{{ __('Edit') }}"
                   class="pull-right">
                    <x-orchid-icon path="settings" width="14px" title="dsds" />
                </a>
            @endif
            {!! $hint->content !!}
        </div>
    </div>
</div>




