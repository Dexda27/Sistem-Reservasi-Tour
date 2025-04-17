 <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
        <a href="#" class="app-brand-link">
          <span class="app-brand-logo demo">
            <img src="<?=base_url('assets/img/favicon/logo_senangtour.png')   ?> " width="30" height="30" fill="none"></img>
          </span>
          <span class="app-brand-text menu-text fw-bold">Senang Tours <br> & Travel</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
          <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
          <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
      </div>

      <div class="menu-inner-shadow"></div>
      <!-- admin master -->
      <?php if($this->session->userdata("role_id") == "1"){ ?>
        <ul class="menu-inner py-1 gap-1">
          <li class="menu-item <?= $url == 'Dashboard' ? 'active' : ' '?>">
            <a href="<?=base_url('Dashboard/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-smart-home"></i>
              <div>Dashboard</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Reservasi' ? 'active' : ' '?>">
            <a href="<?=base_url('Reservasi/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-apps"></i>
              <div>Reservasi </div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Tagihan' ? 'active' : ' '?>">
            <a href="<?=base_url('Tagihan/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-file-dollar"></i>
              <div>Data Tagihan</div>
            </a>
          </li>

          <!-- Menu Reservasi for agent -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Reservasi</span>
          </li>
          <li class="menu-item <?= $url == 'Paket_Rerevasi' ? 'active' : ' '?>">
            <a href="<?=base_url('Reservation/Paket');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
              <div>Paket Reservasi</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Custom_Rerevasi' ? 'active' : ' '?>">
            <a href="<?=base_url('Reservation/Custom');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-shopping-cart-plus"></i>
              <div>Custom Reservasi</div>
            </a>
          </li>
          <!-- Menu Reservasi for agent -->

          <!-- Component -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Produk & Program</span>
          </li>
          <li class="menu-item <?= $url == 'Produk' ? 'active' : ' '?>">
            <a href="<?=base_url('Produk/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-color-swatch"></i>
              <div>Data Produk</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Program' ? 'active' : ' '?>">
            <a href="<?=base_url('Program/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-table"></i>
              <div>Data Program</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Program_Rerevasi' ? 'active' : ' '?>">
            <a href="<?=base_url('Reservation/Program');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-table-options"></i>
              <div>Input Program</div>
            </a>
          </li>
          <!-- Component -->


          <!-- Data Master -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
          </li>
          <li class="menu-item <?= $url == 'Bahasa' ? 'active' : ' '?>">
            <a href="<?=base_url('Bahasa/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-language"></i>
              <div>Data Bahasa</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Guide' ? 'active' : ' '?>">
            <a href="<?=base_url('Guide/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-flag"></i>
              <div>Data Guide</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Kendaraan' ? 'active' : ' '?>">
            <a href="<?=base_url('Kendaraan/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-bus"></i>
              <div>Data Kendaraan</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Sopir' ? 'active' : ' '?>">
            <a href="<?=base_url('Sopir/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-helmet"></i>
              <div>Data Sopir</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'User' ? 'active' : ' '?>">
            <a href="<?=base_url('User/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-users"></i>
              <div>Data User</div>
            </a>
          </li>
          <li class="menu-item <?= $url == 'Vendor' ? 'active' : ' '?>">
            <a href="<?=base_url('Vendor/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-affiliate"></i>
              <div>Data Vendor</div>
            </a>
          </li>
        </ul>
        <!-- agent -->
      <?php }else if($this->session->userdata("role_id") == "2"){ ?>
       <ul class="menu-inner py-1 gap-1">
        <li class="menu-item <?= $url == 'Dashboard' ? 'active' : ' '?>">
          <a href="<?=base_url('Dashboard/');?>" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div>Dashboard</div>
          </a>
        </li>

        <!-- Menu Reservasi for agent -->
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Reservasi</span>
        </li>
        <li class="menu-item <?= $url == 'Paket_Rerevasi' ? 'active' : ' '?>">
          <a href="<?=base_url('Reservation/Paket');?>" class="menu-link">
            <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
            <div>Paket Reservasi</div>
          </a>
        </li>
        <li class="menu-item <?= $url == 'Custom_Rerevasi' ? 'active' : ' '?>">
          <a href="<?=base_url('Reservation/Custom');?>" class="menu-link">
            <i class="menu-icon tf-icons ti ti-shopping-cart-plus"></i>
            <div>Custom Reservasi</div>
          </a>
        </li>

        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Tagihan</span>
        </li>
        <li class="menu-item <?= $url == 'Tagihan' ? 'active' : ' '?>">
          <a href="<?=base_url('Tagihan/');?>" class="menu-link">
            <i class="menu-icon tf-icons ti ti-file-dollar"></i>
            <div>Data Tagihan</div>
          </a>
        </li>
        <!-- Menu Reservasi for agent -->
      </ul>
      <!-- production -->
    <?php }else if($this->session->userdata("role_id") == "3"){ ?>
     <ul class="menu-inner py-1 gap-1">
      <li class="menu-item <?= $url == 'Dashboard' ? 'active' : ' '?>">
        <a href="<?=base_url('Dashboard/');?>" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div>Dashboard</div>
        </a>
      </li> 

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Produk & Program</span>
      </li>
      <li class="menu-item <?= $url == 'Produk' ? 'active' : ' '?>">
        <a href="<?=base_url('Produk/');?>" class="menu-link">
          <i class="menu-icon tf-icons ti ti-color-swatch"></i>
          <div>Data Produk</div>
        </a>
      </li>
      <li class="menu-item <?= $url == 'Program' ? 'active' : ' '?>">
        <a href="<?=base_url('Program/');?>" class="menu-link">
          <i class="menu-icon tf-icons ti ti-table"></i>
          <div>Data Program</div>
        </a>
      </li>
      <li class="menu-item <?= $url == 'Program_Rerevasi' ? 'active' : ' '?>">
        <a href="<?=base_url('Reservation/Program');?>" class="menu-link">
          <i class="menu-icon tf-icons ti ti-table-options"></i>
          <div>Input Program</div>
        </a>
      </li>
    </ul>
    <!-- accounting -->
  <?php }else if($this->session->userdata("role_id") == "4"){ ?>
   <ul class="menu-inner py-1 gap-1">
    <li class="menu-item <?= $url == 'Dashboard' ? 'active' : ' '?>">
      <a href="<?=base_url('Dashboard/');?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div>Dashboard</div>
      </a>
    </li> 
    <li class="menu-item <?= $url == 'Tagihan' ? 'active' : ' '?>">
      <a href="<?=base_url('Tagihan/');?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-file-dollar"></i>
        <div>Data Tagihan</div>
      </a>
    </li>
  </ul>

  <!-- operation -->
<?php }else if($this->session->userdata("role_id") == "5"){ ?>
 <ul class="menu-inner py-1 gap-1">
  <li class="menu-item <?= $url == 'Dashboard' ? 'active' : ' '?>">
    <a href="<?=base_url('Dashboard/');?>" class="menu-link">
      <i class="menu-icon tf-icons ti ti-smart-home"></i>
      <div>Dashboard</div>
    </a>
  </li>
  <li class="menu-item <?= $url == 'Reservasi' ? 'active' : ' '?>">
    <a href="<?=base_url('Reservasi/');?>" class="menu-link">
      <i class="menu-icon tf-icons ti ti-apps"></i>
      <div>Reservasi </div>
    </a>
  </li>
  <li class="menu-item <?= $url == 'Tagihan' ? 'active' : ' '?>">
    <a href="<?=base_url('Tagihan/');?>" class="menu-link">
      <i class="menu-icon tf-icons ti ti-file-dollar"></i>
      <div>Data Tagihan</div>
    </a>
  </li>

  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Data Master</span>
  </li>
  <li class="menu-item <?= $url == 'Bahasa' ? 'active' : ' '?>">
    <a href="<?=base_url('Bahasa/');?>" class="menu-link">
      <i class="menu-icon tf-icons ti ti-language"></i>
      <div>Data Bahasa</div>
    </a>
  </li>
  <li class="menu-item <?= $url == 'Guide' ? 'active' : ' '?>">
    <a href="<?=base_url('Guide/');?>" class="menu-link">
      <i class="menu-icon tf-icons ti ti-flag"></i>
      <div>Data Guide</div>
    </a>
  </li>
  <li class="menu-item <?= $url == 'Kendaraan' ? 'active' : ' '?>">
    <a href="<?=base_url('Kendaraan/');?>" class="menu-link">
      <i class="menu-icon tf-icons ti ti-bus"></i>
      <div>Data Kendaraan</div>
    </a>
  </li>
  <li class="menu-item <?= $url == 'Sopir' ? 'active' : ' '?>">
    <a href="<?=base_url('Sopir/');?>" class="menu-link">
      <i class="menu-icon tf-icons ti ti-helmet"></i>
      <div>Data Sopir</div>
    </a>
  </li>
  <li class="menu-item <?= $url == 'Vendor' ? 'active' : ' '?>">
    <a href="<?=base_url('Vendor/');?>" class="menu-link">
      <i class="menu-icon tf-icons ti ti-affiliate"></i>
      <div>Data Vendor</div>
    </a>
  </li>
</ul> 
<?php }else{ ?>
<?php } ?>
</aside>
