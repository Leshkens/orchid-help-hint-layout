<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout;

use Leshkens\OrchidHelpHintLayout\Services\HelpHintService;
use Orchid\Screen\Layout;
use Orchid\Screen\Repository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HelpHintLayout
 *
 * @package Leshkens\OrchidHelpHintLayout
 */
class HelpHintLayout extends Layout
{
    /**
     * @var Model|null
     */
    protected $hint;

    /**
     * @param Repository $repository
     *
     * @return mixed|void
     */
    public function build(Repository $repository)
    {
        if (is_null($this->hint)) {
            return;
        }

        return view('orchid-help-hint-layout::hint', [
            'hint' => $this->hint
        ]);
    }

    /**
     * @param string $slug
     *
     * @return $this
     */
    public static function make(string $slug): self
    {
        $static = new static;

        $static->hint = HelpHintService::getBySlug($slug);

        return $static;
    }
}
