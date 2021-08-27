<div class="main-menu material-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{Request::routeIs('dashboard') ? 'active' : ''}}"><a href="{{route('dashboard')}}"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard Hospital">Dashboard</span></a>
            </li>
             @can('user-create')
             <li><a class="menu-item" href="#"><i class="material-icons">perm_data_setting</i><span data-i18n="Gear">Gear Management</span></a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item " href=""><i class="material-icons">settings</i><span data-i18n="Manage Gear">Manage Gear</span></a>
                    </li>
                    <li class=""><a class="menu-item" href=""><i class="material-icons">help_outline</i><span data-i18n="Gear Requests">Gear Requests</span></a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class=" nav-item "><a href=""><i class="material-icons">dvr</i><span class="menu-title" data-i18n="Calendar">Students</span></a>
            {{-- <li class=" nav-item {{Request::routeIs('truck.index') ? 'active' : ''}}"><a href="{{route('truck.index')}}"><i class="material-icons">dvr</i><span class="menu-title" data-i18n="Calendar">Trucks</span></a> --}}
            </li>
            <li class=" nav-item "><a href=""><i class="material-icons">playlist_add_check</i><span class="menu-title" data-i18n="Calendar">Reports</span></a>
            </li>
            @can('user-create')
            <li><a class="menu-item" href="#"><i class="material-icons">people_outline</i><span data-i18n="Users">User Management</span></a>
                <ul class="menu-content">
                    <li class="{{Request::routeIs('users.index') ? 'active' : ''}}"><a class="menu-item " href="{{route('users.index')}}"><i class="material-icons"></i><span data-i18n="User Summary">User Summary</span></a>
                    </li>
                    <li class="{{Request::routeIs('roles.index') ? 'active' : ''}}"><a class="menu-item" href="{{route('roles.index')}}"><i class="material-icons"></i><span data-i18n="Roles">Roles</span></a>
                    </li>
                </ul>
            </li>
            @endcan


        </ul>
    </div>
</div>