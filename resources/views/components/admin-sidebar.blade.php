<aside class="main-sidebar elevation-4 sidebar-light-info">
    {{-- Brand Logo --}}
    <div class="brand-link navbar-primary" style="height: 50px"></div>

    {{-- Sidebar --}}
    <div class="sidebar" style="padding-top: 15px">

        {{-- SidebarSearch Form --}}
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library --}}

                {{-- Dashboard Homepage--}}
                @foreach($menus as $menu_key => $menu)

                    <li class="nav-item {{ isset($menu['current']) ? 'menu-open' : '' }}">
                        <a href="{{ $menu['url'] }}" class="nav-link {{ isset($menu['current']) ? 'active' : '' }}">
                            <i class="nav-icon {{ $menu['icon'] }}"></i>
                            <p>
                                {{ $menu['title'] }}
                                @isset( $menu['submenus'] )
                                    <i class="fas fa-angle-left right"></i>
                                @endisset
                            </p>
                        </a>
                        @isset( $menu['submenus'] )
                            <ul class="nav nav-treeview">
                                @foreach($menu['submenus'] as $submenus_key => $submenu)

                                    <li class="nav-item">
                                        <a href="{{ $submenu['url'] }}" class="nav-link {{ isset($submenu['current']) ? 'active' : '' }}">
                                            <i class="nav-icon {{ $submenu['icon'] }}"></i>
                                            <p>{{ $submenu['title'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                    </li>
                @endforeach
{{--                <li class="nav-item">
                    <a href="{{ route('admin.homepage') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                --}}{{-- Contact --}}{{--
                <li class="nav-item">
                    <a href="{{ route('admin.contact') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>İletişim</p>
                    </a>
                </li>
                <li class="nav-header">Content Management</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Ürünler
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>Ürünleri Listele</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.add-product') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Ürün Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.add-product-detail') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Çap Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.categories') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Kategori Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.colors') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Renk Ekle</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders') }}" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Siparişler</p>
                    </a>
                </li>
                <li class="nav-header">Page Management</li>
                --}}{{-- Homepage --}}{{--
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Startseite
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section1') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section2') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section3') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section4') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Popüler Ürünler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section5') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section 5</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section6') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Photo Gallery (Slider)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section7') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kurucu Mesajı</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section8') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.homepage.section9') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>References</p>
                            </a>
                        </li>
                    </ul>
                </li>
                --}}{{--About Page --}}{{--
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            über uns
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.about-us.section1') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kurumsal Başlıklar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.about-us.section2') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kurucu Mesajı</p>
                            </a>
                        </li>
                    </ul>
                </li>
                --}}{{-- Services --}}{{--
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Services
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.services.section1') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.services.section2') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.services.section3') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.services.section4') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section 4</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.services.section5') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('edit-pages.services.section6') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kullanıcı Yorumları</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Blog Yönetimi</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Blog
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('admin.blog.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('admin.blog.add-content') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Content</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('admin.blog.categories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
