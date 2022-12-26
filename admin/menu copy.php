  <!-- MENU -->
  <div class="horizontal-menu-wrapper">
    <div
      class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl"
      role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto">
            <a href="#loginform" data-toggle="modal" data-dismiss="modal">
              <span class="brand-logo">
                <!-- MASUKAN LOGO PERUSAHAAN -->
              </span>
              <h2 class="brand-text mb-0">SINEMA</h2>
            </a>
          </li>
          <li class="nav-item nav-toggle">
            <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
              <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
          <li data-menu="" <?php if (isset($_GET["home"])){echo 'class="active"';}?>>
            <a class="dropdown-item d-flex align-items-center" href="home.php?home">
              <i data-feather="home"></i>
              <span data-i18n="Documentation"><strong>Home</strong></span>
            </a>
          </li>
          <!-- <li data-menu="" <?php if (isset($_GET["kerjasama"])){echo 'class="active"';}?>>
            <a class="dropdown-item d-flex align-items-center" href="kerjasama.php?kerjasama">
              <i data-feather="plus"></i>
              <span data-i18n="Documentation">Kerjasama</span>
            </a>
          </li> -->
          <li class="dropdown nav-item" data-menu="dropdown"
            <?php if (isset($_GET["kerjasama"])){echo 'class="active"';}?>>
            <a class="dropdown-toggle nav-link d-flex align-items-center" data-toggle="dropdown">
              <i data-feather='folder-plus'></i>
              <span data-i18n="Misc"><strong>Kerjasama</strong> </span></a>
            <ul class="dropdown-menu">
              <li data-menu="" <?php if (isset($_GET["kerjasama"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="kerjasama.php?kerjasama" data-toggle="dropdown"
                  data-i18n="Raise Support">
                  <i data-feather='file-text'></i>
                  <span data-i18n="Raise Support">Data Kerjasama</span></a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown"
            <?php if (isset($_GET["master"])){echo 'class="active"';}?>>
            <a class="dropdown-toggle nav-link d-flex align-items-center" data-toggle="dropdown">
              <i data-feather="box"></i>
              <span data-i18n="Misc"><strong>Master Data</strong></span></a>
            <ul class="dropdown-menu">
              <li data-menu="" <?php if (isset($_GET["master"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="negara_data.php?master" data-toggle="dropdown"
                  data-i18n="Raise Support">
                  <i data-feather="flag"></i>
                  <span data-i18n="Raise Support">Data Negara</span></a>
              </li>
              <li data-menu="" <?php if (isset($_GET["master"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="universitas_data.php?master"
                  data-toggle="dropdown" data-i18n="Raise Support">
                  <i data-feather='award'></i>
                  <span data-i18n="Raise Support">Data Universitas</span></a>
              </li>
              <li data-menu="" <?php if (isset($_GET["master"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="fakultas_data.php?master"
                  data-toggle="dropdown" data-i18n="Raise Support">
                  <i data-feather='layers'></i>
                  <span data-i18n="Raise Support">Data Fakultas</span></a>
              </li>
              <li data-menu="" <?php if (isset($_GET["master"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="unit_data.php?master" data-toggle="dropdown"
                  data-i18n="Raise Support">
                  <i data-feather='git-pull-request'></i>
                  <span data-i18n="Raise Support">Data Unit</span></a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown">
              <i data-feather="paperclip"></i>
              <span data-i18n="Misc"><strong>Referensi Kerjasama</strong></span></a>
            <ul class="dropdown-menu">
              <!-- <li data-menu="" <?php if (isset($_GET["ksm"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="lembaga_data.php?ksm" data-toggle="dropdown"
                  data-i18n="Raise Support">
                  <i data-feather='slack'></i>
                  <span data-i18n="Raise Support">Jenis Lembaga</span></a>
              </li> -->
              <li data-menu="" <?php if (isset($_GET["ksm"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="bentuk_kerjasama_data.php?ksm"
                  data-toggle="dropdown" data-i18n="Raise Support">
                  <i data-feather='check-square'></i>
                  <span data-i18n="Raise Support">Bentuk Kerjasama</span></a>
              </li>
              <li data-menu="" <?php if (isset($_GET["ksm"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="jenis_dok_data.php?ksm" data-toggle="dropdown"
                  data-i18n="Raise Support"">
                <i data-feather='twitch'></i>
                <span data-i18n=" Raise Support">Jenis Kerjasama</span></a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown">
              <i data-feather="database"></i>
              <span data-i18n="Misc"><strong>Laporan</strong></span></a>
            <ul class="dropdown-menu">
              <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="dropdown"
                  data-i18n="Raise Support" target="_blank">
                  <i data-feather="life-buoy"></i>
                  <span data-i18n="Raise Support">Laporan Kerjasama</span></a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown">
              <i data-feather="settings"></i>
              <span data-i18n="Misc"><strong>Pengaturan</strong></span></a>
            <ul class="dropdown-menu">
              <li data-menu="" <?php if (isset($_GET["config"])){echo 'class="active"';}?>>
                <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="dropdown"
                  data-i18n="Raise Support">
                  <i data-feather="life-buoy"></i>
                  <span data-i18n="Raise Support">Pengaturan akun</span></a>
              </li>
              <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="web.php?config" data-toggle="dropdown"
                  data-i18n="Raise Support">
                  <i data-feather="life-buoy"></i>
                  <span data-i18n="Raise Support">Pengaturan Website</span></a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown">
              <i data-feather="settings"></i>
              <span data-i18n="Misc"><strong>Users</strong></span></a>
            <ul class="dropdown-menu">
              <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="dropdown"
                  data-i18n="Raise Support" target="_blank">
                  <i data-feather="life-buoy"></i>
                  <span data-i18n="Raise Support">Pengaturan Users</span></a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- END MENU -->
