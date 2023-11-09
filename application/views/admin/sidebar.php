<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">PPDB ALIR</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">PPDB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <!-- dashboard -->
            <li class="<?= ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>


            <li class="menu-header">Data</li>

            <!-- Rekap -->
            <li class="<?= ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'calon_siswa') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/calon_siswa'); ?>"><i class="fas fa-book"></i> <span>Peserta didik</span></a></li>

            <li class="<?= ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'wali_siswa') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/wali_siswa'); ?>"><i class="fas fa-users"></i> <span>Orang Tua/Wali</span></a></li>

            <li class="<?= ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'berkas_siswa') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/berkas_siswa'); ?>"><i class="fas fa-file"></i> <span>Berkas</span></a></li>

            <li class="menu-header">Management Admin</li>

            <!-- admin -->
            <li class="<?= ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'gelombang') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/gelombang'); ?>"><i class="fas fa-cog"></i> <span>Gelombang</span></a></li>

            <li class="<?= ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'list_admin') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/list_admin'); ?>"><i class="fas fa-users"></i> <span>List Admin</span></a></li>

            <li class="<?= ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'profile') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/profile'); ?>"><i class="fas fa-user"></i> <span>Profile</span></a></li>

            <li class=""><a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>

            <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li> -->
        </ul>
    </aside>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LOGOUT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Yakin untuk keluar dari halaman ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>