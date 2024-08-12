<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{ __('Dashboard') }}
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.servers.index') }}" class="nav-link {{ request()->routeIs('admin.servers.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    {{ __('Servers') }}
                </p>
            </a>
        </li>
    </ul>
</nav>
