<?php

namespace App\View\Components;

use App\Models\PageContent;
use Illuminate\View\Component;

class SectionServicesShipping extends Component
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
        $shipping = PageContent::where('page_name', '=', 'services')->where('section_name', '=', 'section_4')->first();
        $shipping = empty($shipping) ? null : json_decode($shipping->content, TRUE);

        $data = [
            'shipping' => $shipping,
        ];


        return view('components.section-services-shipping', $data);
    }
}
