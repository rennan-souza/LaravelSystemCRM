<div class="sidebar-bg" id="sidebarBg" onclick="sidebarExpand()"></div>
<div class="sidebar border-right" id="sidebar">
    <div class="sidebar-link-container">
        <a href="{{ url('/dashboard') }}" class="{{ Request::is('dashboard') ? 'sidebar-link-active' : '' }}">
            <div class="sidebar-link-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="sidebar-link-text">
                Dashboard
            </div>
        </a>

        @can('ADMIN')
            <a href="{{ url('/usuarios') }}" class="{{ Request::is('usuarios**') ? 'sidebar-link-active' : '' }}">
                <div class="sidebar-link-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <div class="sidebar-link-text">
                    Usuários
                </div>
            </a>
        @endcan

        <a href="{{ url('/clientes') }}" class="{{ Request::is('clientes**') ? 'sidebar-link-active' : '' }}">
            <div class="sidebar-link-icon">
                <i class="fas fa-address-card"></i>
            </div>
            <div class="sidebar-link-text">
                Clientes
            </div>
        </a>
        <a href="{{ url('/produtos') }}" class="{{ Request::is('produtos**') ? 'sidebar-link-active' : '' }}">
            <div class="sidebar-link-icon">
                <i class="fas fa-th-large"></i>
            </div>
            <div class="sidebar-link-text">
                Produtos
            </div>
        </a>
    </div>
</div>