<!-- Logo -->
<a href="{{ route('admin.home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>P</b>ANEL</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin </b> Panel</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                @if (!Auth::guard('admin')->check())
                    <a href="{{ route('admin.login') }}">Login</a>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <span> {{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</span>
                    </a>
                @endif
                <ul class="dropdown-menu">
                    <!-- User image -->
                    @if (Auth::guard('admin')->check())
                        <li class="user-header">
                            <p>
                                {{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}
                            </p>
                        </li>
                    @endif
                    <li class="user-footer">

                        <div class="pull-right">
                            @if (Auth::guard('admin')->check())

                                <a class="btn btn-default btn-flat" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
