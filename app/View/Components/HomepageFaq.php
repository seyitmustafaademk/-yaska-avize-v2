<?php

namespace App\View\Components;

use App\Models\PageContent;
use Illuminate\View\Component;

class HomepageFaq extends Component
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
        $homepage_faq = PageContent::where('section_name', '=', 'section_8')->first();
        $homepage_faq = empty($homepage_faq) ? null : json_decode($homepage_faq->content, TRUE);

        return view('components.homepage-faq', ['homepage_faq' => $homepage_faq]);
    }
}
