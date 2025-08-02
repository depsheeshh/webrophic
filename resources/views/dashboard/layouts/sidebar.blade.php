<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                    My Post
                </a>
                @can('admin')
                    <div class="sb-sidenav-menu-heading text-muted">Administrator</div>
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                        href="/dashboard/categories">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-table-cells-large"></i></div>
                        Post Categories
                    </a>
                @endcan
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>