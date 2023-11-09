<nav class="navbar navbar-expand-lg main-navbar">
    <img class="img-fluid mr-2" src="<?= base_url('assets/img/logo_alir.png'); ?>" width="50" alt=""><a href="#" class="navbar-brand sidebar-gone-hide">PPDB ALIR</a>
    <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>

    </div>
    <form class="form-inline ml-auto">

    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= base_url('uploads/profile/' . $this->dt_user->image); ?>" class="rounded-circle mr-1" style="width: 30px; height: 30px;">
                <div class="d-sm-none d-lg-inline-block"><?= $this->dt_user->name; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?= base_url('user/setting'); ?>" class="dropdown-item has-icon">
                    <i class="far fa-bell"></i> Setting
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item <?= ($this->uri->segment(1) == "user" && $this->uri->segment(2) == '') ? 'active' : '' ?>">
                <a href="<?= base_url('user'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == "user" && $this->uri->segment(2) == "biodata") ? 'active' : '' ?>">
                <a href="<?= base_url('user/biodata'); ?>" class="nav-link"><i class="fas fa-user"></i><span>Biodata</span></a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == "user" && $this->uri->segment(2) == "wali") ? 'active' : '' ?>">
                <a href="<?= base_url('user/wali'); ?>" class="nav-link"><i class="fas fa-users"></i><span>Orang Tua/Wali</span></a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == "user" && $this->uri->segment(2) == "berkas") ? 'active' : '' ?>">
                <a href="<?= base_url('user/berkas'); ?>" class="nav-link"><i class="fas fa-file"></i><span>Berkas</span></a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == "user" && $this->uri->segment(2) == "resume") ? 'active' : '' ?>">
                <a href="<?= base_url('user/resume'); ?>" class="nav-link"><i class="fas fa-book"></i><span>Resume</span></a>
            </li>

        </ul>
    </div>
</nav>