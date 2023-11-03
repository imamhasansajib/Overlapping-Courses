<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.header')
    @include('includes.links')
</head>

<body class="sidebar-dark">
    <!-- partial:partials/_settings-panel.html -->
    <div class="settings-panel">
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="layouts-tab" data-toggle="tab" href="#layouts-section" role="tab"
                    aria-controls="layouts-section" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                    aria-controls="chats-section"><i class="mdi mdi-account"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="close-button" href="#"><i class="mdi mdi-window-close"></i></a>
            </li>
        </ul>
        <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active" id="layouts-section" role="tabpanel" aria-labelledby="layouts-tab">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle btn-block mb-4" type="button" id="sidebar-color"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sidebar Mode
                    </button>

                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('includes.topbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="row row-offcanvas row-offcanvas-right">
                <!-- partial:partials/_sidebar.html -->
                @include('includes.sidebar2')
                <!-- partial -->
            </div>
            @yield('content')
            <footer class="footer">
                @include('includes.footer')
            </footer>
        </div>
    </div>
    @include('includes.scripts')
    @yield('extraScript')
</body>

</html>
