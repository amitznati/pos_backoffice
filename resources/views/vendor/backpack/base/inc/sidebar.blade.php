@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-{!! $left !!} image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-{!! $left !!} info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">
          <li class="treeview">
            <a href="#"><i class="fa fa-wrench"></i> <span>Display, Menu</span> <i class="fa fa-angle-{{$right}} pull-{{$right}}"></i></a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('menu_design*') ? 'active' : '' }}">
                  <a href="{!! route('menu_design.index',['menu_id' => 1]) !!}"><i class="fa fa-edit"></i><span>Menu Design</span></a>
              </li>
              <li class="{{ Request::is('menus*') ? 'active' : '' }}">
                  <a href="{!! route('menus.index') !!}"><i class="fa fa-edit"></i><span>Menus</span></a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-wrench"></i> <span>People</span> <i class="fa fa-angle-{{$right}} pull-{{$right}}"></i></a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('employees*') ? 'active' : '' }}">
                  <a href="{!! route('employees.index') !!}"><i class="fa fa-edit"></i><span>Employees</span></a>
              </li>
              <li class="{{ Request::is('contacts*') ? 'active' : '' }}">
                  <a href="{!! route('contacts.index') !!}"><i class="fa fa-edit"></i><span>Contacts</span></a>
              </li>
              <li class="{{ Request::is('customers*') ? 'active' : '' }}">
                  <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-wrench"></i> <span>{{ trans('backpack::pos.catalog') }}</span> <i class="fa fa-angle-{{$right}} pull-{{$right}}"></i></a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('departments*') ? 'active' : '' }}">
                  <a href="{!! route('departments.index') !!}"><i class="fa fa-edit"></i><span>{{ trans('backpack::pos.departments') }}</span></a>
              </li>
              <li class="{{ Request::is('groups*') ? 'active' : '' }}">
                  <a href="{!! route('groups.index') !!}"><i class="fa fa-edit"></i><span>{{ trans('backpack::pos.groups') }}</span></a>
              </li>
              <li class="{{ Request::is('products*') ? 'active' : '' }}">
                  <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>{{ trans('backpack::pos.products') }}</span></a>
              </li>
              <li class="{{ Request::is('vendors*') ? 'active' : '' }}">
                  <a href="{!! route('vendors.index') !!}"><i class="fa fa-edit"></i><span>Vendors</span></a>
              </li>
            </ul>
          </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-wrench"></i> <span>{{ trans('backpack::base.administration') }}</span> <i class="fa fa-angle-{{$right}} pull-{{$right}}"></i></a>
            <ul class="treeview-menu">
             {{--  <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
              <!-- ================================================ -->
              <!-- ==== Recommended place for admin menu items ==== -->
              <!-- ================================================ -->
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-globe"></i> <span>Translations</span> <i class="fa fa-angle-{!! $right !!} pull-{!! $right !!}"></i></a>
                <ul class="treeview-menu">
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language') }}"><i class="fa fa-flag-checkered"></i> Languages</a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language/texts') }}"><i class="fa fa-language"></i> Site texts</a></li>
                </ul>
              </li>
              <li><a href="{{ url('admin/backup') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a></li>
              <li><a href="{{ url('admin/log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
              <li><a href="{{ url('admin/setting') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
              <li><a href="{{ url('admin/page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>
            </ul>
          </li>
          <!-- Users, Roles Permissions -->
          <li class="treeview">
            <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-{!! $right !!} pull-{!! $right !!}"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
              <li><a href="{{ url('admin/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
              <li><a href="{{ url('admin/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
              <li class="{{ Request::is('saleryTypes*') ? 'active' : '' }}">
                  <a href="{!! route('saleryTypes.index') !!}"><i class="fa fa-edit"></i><span>Salery Types</span></a>
              </li>
            </ul>
          </li>
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
