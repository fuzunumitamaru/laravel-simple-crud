{{-- TOP NAV --}}
<nav class="navbar navbar-expand-lg bg-primary">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto"></ul>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->firstname }} </div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
              <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </form>
          </div>
        </li>
      </ul>
    </div>
</nav>

{{-- TOP SUB-NAV --}}
<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('user/dashboard') || request()->is('/store/*') ? 'active' : '' }}">
            <a href="{{ route('user.dashboard') }}" class="nav-link"><i class="fas fa-store"></i><span>STORES</span></a>
        </li>
        <li class="nav-item {{ request()->is('store-trash') || request()->is('store-trash/*') ? 'active' : '' }}">
            <a href="{{ route('store_trash') }}" class="nav-link"><i class="fas fa-trash"></i><span>TRASHED</span></a>
        </li>
    </ul>
    </div>
</nav>
