<aside id="sidebar" class="sidebar">
  
  @if (auth()->user()->role == "admin")
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="/admin-dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin-user">
              <i class="bi bi-circle"></i><span>User</span>
            </a>
          </li>
          <li>
            <a href="/admin-novel">
              <i class="bi bi-circle"></i><span>Novel</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/penyewa-transaksi-create">
              <i class="bi bi-circle"></i><span>Form Persewaan Novel</span>
            </a>
          </li>
          <li>
            <a href="/admin-transaksi">
              <i class="bi bi-circle"></i><span>Pengembalian Novel</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/laporan-peminjaman-aktif">
              <i class="bi bi-circle"></i><span>Laporan Peminjaman Aktif</span>
            </a>
          </li>
          <li>
            <a href="/laporan-transaksi-pinjam">
              <i class="bi bi-circle"></i><span>Laporan Histori Transaksi Peminjaman</span>
            </a>
          </li>
          <li>
            <a href="/laporan-stok-tersedia">
              <i class="bi bi-circle"></i><span>Laporan Stok Novel Tersedia</span>
            </a>
          </li>
          <li>
            <a href="/laporan-stok-tersewa">
              <i class="bi bi-circle"></i><span>Laporan Stok Novel Tersewa</span>
            </a>
          </li>
          <li>
            <a href="/laporan-mutasi-stok">
              <i class="bi bi-circle"></i><span>Laporan Mutasi Stok Novel</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    

    </ul>
  @endif

  @if (auth()->user()->role == "penyewa")
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="/penyewa-dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/penyewa-transaksi-create">
              <i class="bi bi-circle"></i><span>Form Persewaan Novel</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
    

    </ul>
  @endif
</aside>