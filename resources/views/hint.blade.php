<div class="py-3">
    <div class="alert alert-{{ $hint->type }} rounded mb-0" role="alert">
        @if (Auth::user()->hasAccess('platform.systems.help-hints'))
            <a href="{{ route('platform.systems.help-hints.edit', $hint->id) }}"
               title="{{ __('Edit') }}"
               class="pull-right">
                <x-orchid-icon path="settings" width="14px" title="dsds" />
            </a>
        @endif
        @if(!is_null($hint->heading))
            <h5 class="alert-heading">{{ $hint->heading }}</h5>
        @endif
        {!! $hint->content !!}
    </div>
</div>
