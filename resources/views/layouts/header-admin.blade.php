<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Toggle Sidebar -->
            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                data-action="sidebar_toggle">
                <i class="fa fa-navicon"></i>
            </button>
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            <!-- User Dropdown -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-150"
                    aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                        <i class="si si-user mr-5"></i> Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.profile.change-password') }}">
                        <i class="si si-wrench mr-5"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="si si-logout mr-5"></i> Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
</header>
