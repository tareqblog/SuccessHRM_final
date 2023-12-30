<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/admin" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="28">
            </span>
        </a>

        <a href="/admin" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="30">
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-light-sm.png') }}" alt="" height="26">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @foreach ($navbars as $navbarItem)
                    <li>
                        @if (count($navbarItem->childs))
                            <a href="#" class="has-arrow" data-toggle="collapse" data-target="#{{$navbarItem->slug}}">
                                <i class="{{ $navbarItem->menu_icon }} icon nav-icon"></i>
                                <span class="menu-item"
                                    data-key="{{ $navbarItem->slug }}">{{ $navbarItem->menu_name }}</span>
                            </a>
                        @else
                            <a href="{{ $navbarItem->menu_path }}">
                                <i class="{{ $navbarItem->menu_icon }} icon nav-icon"></i>
                                <span class="menu-item"
                                    data-key="{{ $navbarItem->slug }}">{{ $navbarItem->menu_name }}</span>
                            </a>
                        @endif
                        @if (count($navbarItem->childs))
                            <ul class="sub-menu collapse" aria-expanded="false" >
                                @foreach ($navbarItem->childs as $child)
                                    <li><a href="{{ $child->menu_path }}"
                                            data-key="{{ $child->slug }}">{{ $child->menu_name }}</a>
                                        @if (count($child->childs))
                                            <ul class="sub-menu" aria-expanded="false">
                                                @foreach ($child->childs as $lavel2)
                                                    <li><a href="{{ $lavel2->menu_path }}"
                                                            data-key="{{ $lavel2->slug }}">{{ $lavel2->menu_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
