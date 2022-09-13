<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-umbrella-beach"></i>

                    <p>
                        {{ __('TEMPAT WISATA') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('pedagang.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('PEDAGANG') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('usaha.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-store"></i>
                    <p>
                        {{ __('UMKM') }}
                    </p>
                </a>
            </li>

            @if (auth()->user()->akses == 'super admin')
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">

                    <i class="nav-icon fas fa-user-lock"></i>
                    <p>
                        {{ __('ADMIN') }}
                    </p>
                </a>
            </li>
            @endif


            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-window-maximize"></i>


                    <p>
                        {{ __('TENTANG WEB') }}
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    {{-- <i class="nav-icon far far-sign-out"></i> --}}
                    <i class="nav-icon  fas fa-sign-out-alt"></i>
                    <p>
                        {{ __('LOGOUT') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
