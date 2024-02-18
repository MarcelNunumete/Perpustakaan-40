<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-mini">
          BY  :
        </a>
        <a href="javascript:void(0)" class="simple-text logo-normal">
          Marcello
        </a>
      </div>
      <ul class="nav">
        <li class="active ">
          <a href="/dashboard">
            <i class="tim-icons icon-chart-pie-36"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @can('admin')
        <li>
          <a href="/bookadmin">
            <i class="tim-icons icon-puzzle-10"></i>
            <p>Daftar Buku</p>
          </a>
        </li>
        @endcan
        <li>
          <a href="/pinjambuku">
            <i class="tim-icons icon-align-center"></i>
            <p>Pinjam Buku</p>
          </a>
        </li>
        <li>
          <a href="/peminjaman">
            <i class="tim-icons icon-world"></i>
            <p>Data Peminjaman</p>
          </a>
        </li>
        <li class="active-pro">
          <a href="./upgrade.html">
            <i class="tim-icons icon-spaceship"></i>
            <p>Upgrade to PRO</p>
          </a>
        </li>
      </ul>
    </div>
  </div>