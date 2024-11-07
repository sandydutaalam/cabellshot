<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                    </span>
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                        data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="{{ route('admin.dashboard') }}">
                            <span class="font-size-xl text-dual-primary-dark">CSMS</span>|<span
                                class="font-size-xl text-primary">ADMIN</span>
                        </a>
                    </div>
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="{{ asset('admin/img/avatars/avatar15.jpg') }}"
                        alt="">
                </div>
                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="{{ route('admin.profile.index') }}">
                        <img class="img-avatar" src="{{ asset('admin/img/avatars/avatar15.jpg') }}" alt="">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase"
                                href="{{ route('admin.profile.index') }}">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="si si-logout"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"><i class="si si-cup"></i><span
                                class="sidebar-mini-hide">Dashboard</span></a>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                class="si si-puzzle"></i><span class="sidebar-mini-hide">Services</span></a>
                        <ul>
                            <li><a href="{{ route('admin.services.create') }}">Add Services</a></li>
                            <li><a href="{{ route('admin.services.index') }}">Manage Services</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                class="si si-energy"></i><span class="sidebar-mini-hide">Type of Events</span></a>
                        <ul>
                            <li><a href="{{ route('admin.event-types.create') }}">Add Event Types</a></li>
                            <li><a href="{{ route('admin.event-types.index') }}">Manage Event Types</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                class="si si-layers"></i><span class="sidebar-mini-hide">About and Contact</span></a>
                        <ul>
                            <li><a href="{{ route('admin.pages.about') }}">About Us</a></li>
                            <li><a href="{{ route('admin.pages.contact') }}">Contact Us</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-note"></i><span
                                class="sidebar-mini-hide">Booking</span></a>
                        <ul>
                            <li><a href="{{ route('admin.bookings.new') }}">New Booking</a></li>
                            <li><a href="{{ route('admin.bookings.approved') }}">Approved Booking</a></li>
                            <li><a href="{{ route('admin.bookings.cancelled') }}">Cancelled Booking</a></li>
                            <li><a href="{{ route('admin.bookings.all') }}">All Booking</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i><span
                                class="sidebar-mini-hide">Contact Us </span></a>
                        <ul>
                            <li>
                                <a href="{{ route('admin.contact-query.unread') }}">Unread msg</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.contact-query.read') }}">Read msg</a>
                            </li>

                        </ul>
                    </li>

                    {{-- <li>
                        <a href="{{ route('admin.filter-date.index') }}"><i class="si si-vector"></i><span
                                class="sidebar-mini-hide">B/w Dates Report</span></a>
                    </li> --}}

                    <li>
                        <a href="{{ route('admin.search-booking.index') }}"><i class="si si-magnifier"></i><span
                                class="sidebar-mini-hide">Booking Search</span></a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
