<?php

namespace App\View\Components;

use App\Models\PageContent;
use Illuminate\View\Component;

class SectionReference extends Component
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
        $section_data = PageContent::where('section_name', '=', 'section_9')->first();
        $section_data = empty($section_data) ? null : json_decode($section_data['content'], TRUE);

        $data = [
            'section_data' => $section_data,
        ];
        return view('components.section-reference', $data);
    }
}
