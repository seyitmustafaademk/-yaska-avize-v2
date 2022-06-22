<?php

namespace App\View\Components;

use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;

class AdminSidebar extends Component
{

    public function render()
    {
        $data = [
            'menus' => [
                [
                    'title' => 'Dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'url' => route('admin.homepage'),
                ],
                [
                    'title' => 'İletişim',
                    'icon' => 'fas fa-envelope',
                    'url' => route('admin.contact'),
                ],
                [
                    'title' => 'Galeri',
                    'icon' => 'fas fa-image',
                    'url' => route('admin.gallery'),
                ],
                [
                    'title' => 'Ürünler',
                    'icon' => 'fas fa-tree',
                    'url' => '#',
                    'submenus' => [
                        [
                            'title' => 'Ürünleri Listele',
                            'icon' => 'fas fa-list-ul',
                            'url' => route('admin.products'),
                        ],
                        [
                            'title' => 'Ürün Ekle',
                            'icon' => 'fas fa-plus',
                            'url' => route('admin.add-product'),
                        ],
                        [
                            'title' => 'Çap Ekle',
                            'icon' => 'fas fa-plus',
                            'url' => route('admin.add-product-detail'),
                        ],
/*                        [
                            'title' => 'Kategori Ekle',
                            'icon' => 'fas fa-plus',
                            'url' => route('admin.product.categories'),
                        ],
                        [
                            'title' => 'Renk Ekle',
                            'icon' => 'fas fa-plus',
                            'url' => route('admin.product.colors'),
                        ],*/
                    ]
                ],
                [
                    'title' => 'Siparişler',
                    'icon' => 'fas fa-list-ul',
                    'url' => route('admin.orders'),
                ],
                [
                    'title' => 'Startseite',
                    'icon' => 'fas fa-tree',
                    'url' => '#',
                    'submenus' => [
                        [
                            'title' => 'Section 1',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section1'),
                        ],
                        [
                            'title' => 'Section 2',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section2'),
                        ],
                        [
                            'title' => 'Section 3',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section3'),
                        ],
                        [
                            'title' => 'Popüler Ürünler',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section4'),
                        ],
                        [
                            'title' => 'Section 5',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section5'),
                        ],
                        [
                            'title' => 'Photo Gallery (Slider)',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section6'),
                        ],
                        [
                            'title' => 'Kurucu Mesajı',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section7'),
                        ],
                        [
                            'title' => 'FAQ',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section8'),
                        ],
                        [
                            'title' => 'References',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.homepage.section9'),
                        ],
                    ]
                ],
                [
                    'title' => 'über uns',
                    'icon' => 'fas fa-tree',
                    'url' => '#',
                    'submenus' => [
                        [
                            'title' => 'Kurumsal Başlıklar',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.about-us.section1'),
                        ],
                        [
                            'title' => 'Kurucu Mesajı',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.about-us.section2'),
                        ],
                        [
                            'title' => 'Raportajlar',
                            'icon' => 'far fa-circle',
                            'url' => route('admin.edit-pages.about-us.section-3'),
                        ],
                    ]
                ],
                [
                    'title' => 'Shop',
                    'icon' => 'fas fa-tree',
                    'url' => '#',
                    'submenus' => [
                        [
                            'title' => 'Section 1',
                            'icon' => 'far fa-circle',
                            'url' => route('admin.edit-pages.shop.section-1'),
                        ],
                    ]
                ],
                [
                    'title' => 'Services',
                    'icon' => 'fas fa-tree',
                    'url' => '#',
                    'submenus' => [
                        [
                            'title' => 'Section 1',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.services.section1'),
                        ],
                        [
                            'title' => 'Section 2',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.services.section2'),
                        ],
                        [
                            'title' => 'Section 3',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.services.section3'),
                        ],
                        [
                            'title' => 'Section 4',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.services.section4'),
                        ],
                        [
                            'title' => 'FAQ',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.services.section5'),
                        ],
                        [
                            'title' => 'Kullanıcı Yorumları',
                            'icon' => 'far fa-circle',
                            'url' => route('edit-pages.services.section6'),
                        ],
                    ]
                ],
                [
                    'title' => 'Blog',
                    'icon' => 'fas fa-tree',
                    'url' => '#',
                    'submenus' => [
                        [
                            'title' => 'List',
                            'icon' => 'far fa-circle',
                            'url' => route('admin.blog.list'),
                        ],
                        [
                            'title' => 'Add Content',
                            'icon' => 'far fa-circle',
                            'url' => route('admin.blog.add-content'),
                        ],
                        [
                            'title' => 'Categories',
                            'icon' => 'far fa-circle',
                            'url' => route('admin.blog.categories'),
                        ],
                    ]
                ],
            ],
        ];

        foreach ( $data['menus'] as $menu_key => $menu ) {
            if ( isset($menu['submenus']) ){
                foreach ( $menu['submenus'] as $submenu_key => $submenu ) {
                    if ( $submenu['url'] == URL::current()){
                        $data['menus'][$menu_key]['current'] = true;
                        $data['menus'][$menu_key]['submenus'][$submenu_key]['current'] = true;
                    }
                }
            }
            else {
                if ( $menu['url'] == URL::current())
                    $data['menus'][$menu_key]['current'] = true;

            }

        }

        return view('components.admin-sidebar', $data);
    }
}
