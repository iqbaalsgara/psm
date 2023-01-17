<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">INVOSYS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PSM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Office</li>
            <li class="nav-item dropdown">
                <a href="/surat_jalan" class="nav-link {{Request::is('surat_jalan') ? 'text-danger' : ''}}"><i class="fas fa-columns"></i> <span>Data Surat Jalan</span></a>
                <a href="/penawaran" class="nav-link {{Request::is('penawaran') ? 'text-danger' : ''}}"><i class="fas fa-percent"></i> <span>Penawaran</span></a>
         
                
                @if(Auth::user()->role->nama_role == 'SuperAdmin')
                <a href="/pembukuan" class="nav-link {{Request::is('pembukuan') ? 'text-danger' : ''}}"><i class="fas fa-book"></i> <span>Pembukuan</span></a>
                @endif
                
                @if(Auth::user()->role->nama_role == 'SuperAdmin')
                <a href="/customer" class="nav-link {{Request::is('customer') ? 'text-danger' : ''}}"><i class="fas fa-user"></i> <span>Customer</span></a>
                <a href="/report" class="nav-link {{Request::is('report') ? 'text-danger' : ''}}"><i class="fas fa-industry"></i> <span>Report</span></a>
                
                <a href="/perusahaan" class="nav-link {{Request::is('perusahaan') ? 'text-danger' : ''}}"><i class="fas fa-building"></i> <span>Perusahaan</span></a>
                <a href="/user" class="nav-link {{Request::is('user') ? 'text-danger' : ''}}"><i class="fas fa-user-circle"></i> <span>Account</span></a>
                <a href="/arsip" class="nav-link {{Request::is('arsip') ? 'text-danger' : ''}}"><i class="fas fa-archive"></i> <span>Arsip</span></a>
            </li>
 
            <li class="menu-header">Warehouse</li>
            <li class="nav-item dropdown">
                <a href="/pembelian" class="nav-link {{Request::is('pembelian') ? 'text-danger' : ''}}"><i class="fas fa-shopping-cart"></i> <span>Pembelian</span></a>
                <!--
                <a href="/pengiriman" class="nav-link {{Request::is('pengiriman') ? 'text-danger' : ''}}"><i class="fas fa-truck"></i> <span>Pengiriman</span></a>
                -->
            </li>
        </ul>
@endif
<!--
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a class="btn btn-danger btn-lg btn-block btn-icon-split" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
-->
            </form>
        </div>
    </aside>
</div>