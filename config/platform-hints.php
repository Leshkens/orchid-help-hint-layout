<?php

return [

    /**
     * Hint model.
     */
    'model' => \Leshkens\OrchidHelpHintLayout\Models\HelpHint::class,

    /**
     * 'hint_slug' => 'Hint description'. In 'hint_slug' separate words with underscores.
     * Example: 'news_edit_right' => 'Hint on the right side of the add news screen'.
     */
    'hints_map' => [

    ],

    /**
     * Number of items in the list on /systems/help-hints
     */
    'per_page' => 15
];
