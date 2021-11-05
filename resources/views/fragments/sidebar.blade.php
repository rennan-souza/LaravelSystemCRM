<div class="sidebar-contaianer-close" id="sidebarContainerClose" onclick="sidebarExpand()"></div>
<div class="sidebar" id="sidebar">
    <div class="sidebar-logo-container">
        <a class="sidebar-logo" href="{{ url('/dashboard') }}">System CRM</a>
    </div>
    <div class="sidebar-nav">
        <a href="{{ url('/dashboard') }}" class="{{ Request::is('dashboard') ? 'sidebar-link-active' : '' }}">
            <div class="sidebar-nav-icon">
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <div class="sidebar-nav-textlink">
                Dashboard
            </div>
        </a>

        <a href="{{ url('/usuarios') }}" class="{{ Request::is('usuarios') ? 'sidebar-link-active' : '' }}">
            <div class="sidebar-nav-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="sidebar-nav-textlink">
                Usuários
            </div>
        </a>

        <a href="#">
            <div class="sidebar-nav-icon">
                <i class="fas fa-handshake"></i>
            </div>
            <div class="sidebar-nav-textlink">
                Clientes
            </div>
        </a>

        <a href="#">
            <div class="sidebar-nav-icon">
                <i class="fas fa-th-large"></i>
            </div>
            <div class="sidebar-nav-textlink">
                Produtos
            </div> 
        </a>

        <a href="#">
            <div class="sidebar-nav-icon">
                <i class="fas fa-globe"></i>
            </div>
            <div class="sidebar-nav-textlink">
                Web store
            </div>
        </a>

        <a href="#">
            <div class="sidebar-nav-icon">
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="sidebar-nav-textlink">
                Meus dados
            </div>
        </a>
    </div>
</div>
