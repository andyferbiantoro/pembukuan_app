<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="assets/images/logos/my_jamur_logo.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item {{(request()->is('index')) ? 'active' : ''}}">
              <a class="sidebar-link" href="{{ route('index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Beranda</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Manajemen</span>
            </li>
            <li class="sidebar-item {{(request()->is('panen_index')) ? 'active' : ''}}" color>
              <a class="sidebar-link" href="{{ route('panen_index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-leaf"></i>
                </span>
                <span class="hide-menu">Panen Jamur</span>
              </a>
            </li>
            <li class="sidebar-item {{(request()->is('penjualan_index')) ? 'active' : ''}}">
              <a class="sidebar-link" href="{{ route('penjualan_index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart-plus"></i>
                </span>
                <span class="hide-menu">Penjualan</span>
              </a>
            </li>
             <li class="sidebar-item {{(request()->is('laporan_index')) ? 'active' : ''}}">
              <a class="sidebar-link" href="{{ route('laporan_index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-clipboard-text"></i>
                </span>
                <span class="hide-menu">Laporan</span>
              </a>
            </li>
            
           
            
          </ul>
         
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>