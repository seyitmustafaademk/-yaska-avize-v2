<?php

namespace App\View\Components;

use App\Models\PageContent;
use Illuminate\View\Component;

class SectionFounderMessage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $founder_message = PageContent::where('section_name', '=', 'section_7')->first();
        $founder_message = empty($founder_message) ? null : json_decode($founder_message['content'], TRUE);

        $data = [
            'founder_message' => $founder_message,
        ];
        return view('components.section-founder-message', $data);
    }
}
