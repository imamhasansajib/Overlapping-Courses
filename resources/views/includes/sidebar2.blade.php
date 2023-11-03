<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-info">
        <div class="profile">
            <img src="{{ asset('/thumbnail')}}/{{ Session::get('userimage') }}" alt="">
        </div>
        <div class="details">
            <p class="user-name">{{ Session::get('username') }}</p>
            <p class="designation">Student</p>
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('edit-profile') }}">
                <i class="mdi mdi-account-settings-variant menu-icon"></i>
                <span class="menu-title">Update Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('edit-pass') }}">
                <i class="mdi mdi-account-settings-variant menu-icon"></i>
                <span class="menu-title">Change Password</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('enroll-course') }}">
                <i class="mdi mdi-puzzle menu-icon"></i>
                <span class="menu-title">Enrollment</span>
            </a>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('checkrequests') }}">
                <i class="mdi mdi-alert-circle-outline menu-icon"></i>
                <span class="menu-title">Pending List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
                <i class="mdi mdi-calendar-text menu-icon"></i>
                <span class="menu-title">To-do list</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">
                <i class="feather icon-power text-danger"></i>
                <span class="menu-title">&nbsp; Logout</span>
            </a>
        </li>
    </ul>
</nav>