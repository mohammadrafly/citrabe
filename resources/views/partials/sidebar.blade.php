<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            CITRA<span>ADMIN</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#master" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="grid"></i>
                    <span class="link-title">Master</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="master">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('group') }}" class="nav-link">Group</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('users') }}" class="nav-link">Users</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>