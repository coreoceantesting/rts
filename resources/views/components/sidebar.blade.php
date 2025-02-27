<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="55" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="55" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}" >
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                @if(Auth::user()->hasRole('Super Admin'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('ward.*') ? 'active' : '' }} {{ request()->routeIs('zone.*') ? 'active' : '' }} {{ request()->routeIs('fees.*') ? 'active' : '' }}" href="#sidebarMaster" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaster">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMaster">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('ward.index') }}" class="nav-link {{ request()->routeIs('ward.*') ? 'active' : '' }}" data-key="t-horizontal">Ward</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('zone.index') }}" class="nav-link {{ request()->routeIs('zone.*') ? 'active' : '' }}" data-key="t-horizontal">Zone</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('fees.index') }}" class="nav-link {{ request()->routeIs('fees.*') ? 'active' : '' }}" data-key="t-horizontal">Fees</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('signature.index') }}" class="nav-link {{ request()->routeIs('signature.*') ? 'active' : '' }}" data-key="t-horizontal">Signature</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nature-business.index') }}" class="nav-link {{ request()->routeIs('nature-business.*') ? 'active' : '' }}" data-key="t-horizontal">Nature of Business</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if(!Auth::user()->hasRole('Super Admin'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('user.profile') }}">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">My Profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('my-application') }}">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">My Application</span>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link menu-link" href="javascript:void(0)">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">RTS Guideline</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="javascript:void(0)">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Important Link</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="javascript:void(0)">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Contact</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
