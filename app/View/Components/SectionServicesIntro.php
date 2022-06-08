<?php

namespace App\View\Components;

use App\Models\PageContent;
use Illuminate\View\Component;

class SectionServicesIntro extends Component
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
        $services_intro = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_1')->first();
        $services_intro = empty($services_intro) ? null : json_decode($services_intro->content, TRUE);

        $data = [
            'services_intro' => $services_intro,
        ];

        return view('components.section-services-intro', $data);
    }
}
