<!doctype html>
<html lang="en" class="no-focus">

<head>
    <title>Online CabellShots Booking System - Admin Dashboard</title>

    <link rel="stylesheet" id="css-main" href="{{ asset('admin/css/codebase.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/plugins/datatables/dataTables.bootstrap4.min.css') }}">

</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Header -->
        @include('layouts.header-admin')

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="content">
                @yield('content')
            </div>
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        @include('layouts.footer-admin')
    </div>
    <!-- END Page Container -->



    <script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/jquery.scrollLock.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/jquery.countTo.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/js.cookie.min.js') }}"></script>
    <script src="{{ asset('admin/js/codebase.js') }}" defer></script>

    <script src="{{ asset('admin/js/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript" defer>
    </script>
    <script src="{{ asset('admin/js/plugins/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript" defer>
    </script>
    <script src="{{ asset('admin/js/pages/be_tables_datatables.js') }}" defer></script>

    <script src="{{ asset('admin/js/plugins/chartjs/Chart.bundle.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('assets/js/pages/be_pages_dashboard.js') }}" type="text/javascript" defer></script>


    @yield('js')


    @include('components.toast')
</body>

</html>
