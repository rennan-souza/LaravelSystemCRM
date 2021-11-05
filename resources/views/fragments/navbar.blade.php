<div class="navbar border-bottom">
    <div class="navbar-logo-container">
        <a class="navbar-logo" href="{{ url('/dashboard') }}">System CRM</a>
    </div>
    <div class="navbar-btn-menu-expand-container">
        <i class="fas fa-bars" onclick="sidebarExpand()"></i>
    </div>
    <div class="dropdown ml-auto mr-2">
        <button class="btn btn-sm shadow-none dropdown-toggle" type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-expanded="false">
            <span class="navbar-username">
              {{ Auth::user()->email }}
            </span>
            <span class="navbar-username-icon"><i class="fas fa-user-circle"></i></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ url('logout') }}">
                <i class="fas fa-sign-out-alt mr-2"></i>
                SAIR
            </a>
        </div>
    </div>
</div>
