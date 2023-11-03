<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-info">
        <div class="profile">
            <img src="{{ asset('/thumbnail')}}/{{ Session::get('userimage') }}" alt="">
        </div>
        <div class="details">
            <p class="user-name">{{ Session::get('username') }}</p>
            @if(Session::get('username')=='Admin')
            <p class="designation">admin</p>
            @endif
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#generalSubmenu" aria-expanded="false"
                aria-controls="generalSubmenu">
                <i class="mdi mdi-google-pages menu-icon"></i>
                <span class="menu-title">Student</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="generalSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('student-register') }}">
                            Add New Student
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('students') }}">
                            All Students
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sidebar_layouts" aria-expanded="false"
                aria-controls="sidebar_layouts">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Courses</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar_layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('create-course') }}">Add New Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('courses') }}">All Available Courses</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#generalSubmenu2" aria-expanded="false"
                aria-controls="generalSubmenu2">
                <i class="mdi mdi-google-pages menu-icon"></i>
                <span class="menu-title">Sessions</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="generalSubmenu2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('create-session') }}">
                            Create New Session
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('sessions') }}">
                            All Sessions
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('overlap') }}">
                <i class="mdi mdi-puzzle menu-icon"></i>
                <span class="menu-title">Overlap List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('course-limit') }}">
                <i class="mdi mdi-puzzle menu-icon"></i>
                <span class="menu-title">Limitations</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
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
