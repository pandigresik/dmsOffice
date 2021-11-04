<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
        <i class="cil-menu"></i>
    </button><a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg></a>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
        data-class="c-sidebar-lg-show" responsive="true">
        <i class="cil-menu"></i>
    </button>
    <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
    </ul>
    <ul class="c-header-nav ml-auto mr-4">
        <!--
        <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <i class="cil-bell"></i>
            </a></li>
        <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <i class="cil-list-rich"></i>
            </a></li>
        <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                <i class="cil-envelope-open"></i>
            </a></li>
        -->
        <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('images/avatar/default.jpeg') }} " alt="user@email.com">
                </div>
            </a>            
            <div class="dropdown-menu dropdown-menu-right pt-0">
            <!--    
                <div class="dropdown-header bg-light py-2"><strong>Account</strong></div><a class="dropdown-item"
                    href="#">
                    <i class="cil-bell"></i>
                    Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item" href="#">
                    <i class="cil-envelope-open"></i>
                    Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item" href="#">
                    <i class="cil-task"></i>
                    Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item" href="#">
                    <i class="cil-comment-square"></i>
                    Comments<span class="badge badge-warning ml-auto">42</span></a>
                
                
            -->    
            <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div><a class="dropdown-item"
                    href="#">
                    <i class="cil-user"></i>
                    Profile</a><a class="dropdown-item" href="#">
                    <i class="cil-settings"></i>                    
                    Settings</a>
                <!--    
                    <a class="dropdown-item" href="#">
                    <i class="cil-credit-card"></i>
                    Payments<span class="badge badge-secondary ml-auto">42</span></a><a class="dropdown-item" href="#">
                    <i class="cil-file"></i>
                    Projects<span class="badge badge-primary ml-auto">42</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                    <i class="cil-lock-locked"></i>
                    Lock Account</a>
                -->    
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="c-icon cil-account-logout"></i>&nbsp;
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>                    
            </div>
        </li>
    </ul>
    
    <div class="c-subheader px-3">
        @stack('breadcrumb')        
    </div>
    
</header>
