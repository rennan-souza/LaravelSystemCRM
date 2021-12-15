<div class="header">
    <div class="header-btn-sidebar-expand">
        <button type="button" class="btn btn-sm btn-light" onclick="sidebarExpand()">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <a href="{{ url('/dashboard') }}" class="header-logo">System CRM</a>
    <div class="dropdown ml-auto">
        <button class="btn btn-sm shadow-none p-0 text-white" type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-expanded="false">
            <span class="header-username-text">
                {{ Auth::user()->email }} <span class="ml-1 dropdown-toggle"></span> 
            </span>
            <span class="header-username-icon"><i class="fas fa-user-circle"></i></span>        
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ url('logout') }}">
                <i class="fas fa-sign-out-alt mr-2"></i>
                SAIR
            </a>
        </div>
    </div>
</div>
