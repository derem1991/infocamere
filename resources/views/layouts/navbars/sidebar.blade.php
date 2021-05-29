<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ config('app.logo_url')}}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ config('app.asset_url')}}/img/profile.png">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Benvenuto!</h6>
                    </div>
                    <a href="{{ route('users.myProfile') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Mio profilo</span>
                    </a>
                   
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ config('app.logo_url')}}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.myProfile') }}">
                        <i class="ni ni-single-02 text-primary"></i>Mio profilo
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents.index') }}">
                        <i class="fa fa-file text-primary"></i>Documenti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents.index2') }}">
                        <i class="fa fa-file text-primary"></i>Documenti 2
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            @can('role-list')
            <h6 class="navbar-heading text-muted">ADMIN</h6>
             <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item @if(Route::currentRouteName() == 'users.index') active @endif">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="ni ni-single-02"></i> Utenti
                    </a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'roles.index') active @endif">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="ni ni-trophy"></i> Ruoli
                    </a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'permissions.index') active @endif">
                    <a class="nav-link" href="{{ route('permissions.index') }}">
                        <i class="ni ni-lock-circle-open"></i> Permessi
                    </a>
                </li>
            </ul>
            @endcan
        </div>
    </div>
</nav>
