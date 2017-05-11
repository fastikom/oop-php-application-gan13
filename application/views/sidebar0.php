<?php
//mengecek status login
$is_login = $this->session->userdata('is_login');
$level    = $this->sesion->userdata('level')
 ?>

 <?php if ($is_login);?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>

        <a href="logout"><i class="fa fa-circle text-success"></i> Logout</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Menu Utama</li>
      <li class="treeview">
        <a href="#">
          <i class="master"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="menu-kelas"><i class="fa fa-circle-o"></i> Kamar</a></li>
          <li><a href="menu-siswa"><i class="fa fa-circle-o"></i> Siswa</a></li>
          <li><a href="menu-buku"><i class="fa fa-circle-o"></i> Buku</a></li>
          <?php if ($level === 'admin'): ?>
          <li><a href="menu-user"><i class="fa fa-circle-o"></i> User</a></li>
        <?php endif ?>
          </ul>
      </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Transaksi</span>
          <span class="label label-primary pull-right">2</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="menu-peminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
          <li><a href="menu-pengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
          </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Laporan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="menu-lap-buku"><i class="fa fa-circle-o"></i> Buku</a></li>
          <li><a href="menu-lap-peminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
          <li><a href="menu-lap-pengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
          <li><a href="menu-lap-denda"><i class="fa fa-circle-o"></i> denda</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
  <!------------------------->

  <!-- /sidebar untuk Guest-->
</aside>
<?php  else: ?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>

          <a href="logout"><i class="fa fa-circle text-success"></i> Logout</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu </li>
        <li class="treeview">
          <a href="#">
            <i class="master"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li><a href="menu-buku"><i class="fa fa-circle-o"></i> Buku</a></li>
          </ul>
        <?php endif ?>
