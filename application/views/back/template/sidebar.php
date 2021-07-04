<header class="main-header">
    <a href="./" class="logo">
        <span class="logo-mini"><b>CFNB</b></span>
        <span class="logo-lg"><b>CF Net Belief</b></span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    </nav>
</header>
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li id="page-dashboard"><a href="./"><i class="fa fa-circle"></i> <span>Beranda</span></a></li>
            <li id="page-gejala"><a href="<?= base_url('gejala/listGejala') ?>"><i class="fa fa-circle"></i> <span>Gejala</span></a></li>
            <li id="page-diagnosa"><a href="<?= base_url('diagnosa/listDiagnosa') ?>"><i class="fa fa-circle"></i> <span>Diagnosa</span></a></li>
            <li id="page-pengetahuan"><a href="<?= base_url('b_pengetahuan/listPengetahuan') ?>"><i class="fa fa-circle"></i> <span>Basis Pengetahuan</span></a></li>
            <li id="page-konsultasi"><a href="<?= base_url('konsultasi/listKonsultasi') ?>"><i class="fa fa-circle"></i> <span>Record Konsultasi</span></a></li>
            <li id="page-admin"><a href="<?= base_url('admin/listAdmin') ?>"><i class="fa fa-circle"></i> <span>Admin</span></a></li>
            <li id="page-pengaturan"><a href="<?= base_url('admin/pengaturan') ?>"><i class="fa fa-circle"></i> <span>Pengaturan Akun</span></a></li>
            <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>