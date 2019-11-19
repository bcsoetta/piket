<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('jadwal_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.jadwals.index") }}" class="nav-link {{ request()->is('admin/jadwals') || request()->is('admin/jadwals/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-calendar-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.jadwal.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/bidangs*') ? 'menu-open' : '' }} {{ request()->is('admin/lokasis*') ? 'menu-open' : '' }} {{ request()->is('admin/seksis*') ? 'menu-open' : '' }} {{ request()->is('admin/petugas*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-wrench">

                            </i>
                            <p>
                                <span>{{ trans('cruds.setting.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('bidang_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.bidangs.index") }}" class="nav-link {{ request()->is('admin/bidangs') || request()->is('admin/bidangs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-users">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.bidang.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lokasi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lokasis.index") }}" class="nav-link {{ request()->is('admin/lokasis') || request()->is('admin/lokasis/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-map-marked">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.lokasi.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('seksi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.seksis.index") }}" class="nav-link {{ request()->is('admin/seksis') || request()->is('admin/seksis/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-users">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.seksi.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('petuga_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.petugas.index") }}" class="nav-link {{ request()->is('admin/petugas') || request()->is('admin/petugas/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.petuga.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>