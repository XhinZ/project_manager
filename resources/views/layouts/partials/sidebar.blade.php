<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{ Auth::user()->roles()->first()->name }}</strong>
                                </span>
                                <span class="text-muted text-xs block">Options<b class="caret"></b></span>
                            </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    PM+
                </div>
            </li>
            <li {{ setActive('home') }}>
                <a href="{{ url('/home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dash Board</span></a>
            </li>

            @role('owner')
            <li {{ setActive('roles') }}>
                <a href="{{ url('/roles') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Manage Roles</span></a>
            </li>
            <li {{ setActive('skills') }}>
                <a href="{{ url('/skills') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Manage Skills</span></a>
            </li>
            <li {{ setActive('users') }}>
                <a href="{{ url('/users') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Manage Users</span></a>
            </li>
            <li {{ setActive('projects') }}>
                <a href="{{ url('/projects') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Manage Projects</span></a>
            </li>
            @endrole


        </ul>
    </div>
</nav>