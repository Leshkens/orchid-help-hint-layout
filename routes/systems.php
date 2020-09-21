<?php

use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\Route;
use Leshkens\OrchidHelpHintLayout\Http\Screens\HelpHintEditScreen;
use Leshkens\OrchidHelpHintLayout\Http\Screens\HelpHintListScreen;


Route::screen('/{help_hint}/edit', HelpHintEditScreen::class)
    ->name('systems.help-hints.edit')
    ->breadcrumbs(function (Trail $trail, int $hint) {
        $trail
            ->parent('platform.systems.help-hints')
            ->push(__('Editing hint'), route('platform.systems.help-hints.edit', $hint));
    });

Route::screen('/create', HelpHintEditScreen::class)
    ->name('systems.help-hints.create')
    ->breadcrumbs(function (Trail $trail) {
        $trail
            ->parent('platform.systems.help-hints')
            ->push(__('Creation hint'), route('platform.systems.help-hints.create'));
    });

Route::screen('/', HelpHintListScreen::class)
    ->name('systems.help-hints')
    ->breadcrumbs(function (Trail $trail) {
        $trail
            ->parent('platform.systems.index')
            ->push(__('Hints'), route('platform.systems.help-hints'));
    });
