<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->

    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>

    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li @if(Route::currentRouteName() == 'admin.home') class="active" @endif>
            <a href="{{url('/')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>

            </a>
            <ul class="treeview-menu">

            </ul>
        </li>



        <li @if(in_array(Route::currentRouteName(),
            [
                'admin.task.index',
                'admin.task.create',
                'admin.task.show',
                'admin.task.edit',
            ]
            )) class='active' @endif>
            <a href="{{route('admin.task.index')}}"><i class="fa fa-server"></i> <span>Task</span></a>
        </li>

        <li>
            <a href=""><i class="fa fa-cogs"></i> <span>Setting</span></a>
        </li>


    </ul>
</section>
<!-- /.sidebar -->
