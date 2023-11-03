<nav class="navbar navbar-light col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="dashboard"><img src="{{ asset('/images/puc1.png') }}" alt="Logo"></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="btn-group d-none d-sm-block">
            <button type="button" class="btn btn-secondary btn-sm text-muted border-0 dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
        <form class="form-inline mt-2 ml-3 mt-md-0 d-none d-sm-block">
            <div class="input-group solid">
                <span class="input-group-addon"><i class="mdi mdi-magnify"></i></span>
                <input type="text" class="form-control">
            </div>
        </form>
        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">
                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                        <img src="{{ asset('/thumbnail')}}/{{ Session::get('userimage') }}" alt
                            class="profile rounded-circle" width="35" height="35">
                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{ Session::get('username') }}</span>
                    </span>
                </a>
                <div class="dropdown-menu navbar-dropdown mail-notification" aria-labelledby="MailDropdown">
                    <a class="dropdown-item" href="{{ url('dashboard') }}">
                        <i class="feather icon-user text-muted"></i>
                        &nbsp; My profile
                    </a>
                    <a class="dropdown-item" href="{{ url('edit-profile') }}">
                        <i class="feather icon-settings text-muted"></i>
                        &nbsp; Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('logout') }}">
                        <i class="feather icon-power text-danger"></i>
                        &nbsp; Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">

            <span class="navbar-toggler-icon"></span>
        </button>
</nav>
