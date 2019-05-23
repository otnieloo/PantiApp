  <!--==========================
    Header Sebelum Login
  ============================-->
  <header id="header" >
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="<?php echo site_url('panti/index'); ?>" class="scrollto">Donasi</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container" class="pr-0">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo site_url('panti/index') ?>">Home</a></li>
          <li class="menu-has-children"><a href="<?php echo site_url('panti/daftar_panti') ?>">Daftar Panti</a>
          </li>
          <li><a href="<?php echo site_url('panti/about') ?>">About Us</a></li>
          <li>
            <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary px-lg-2 py-lg-2 mb-3">Login</button>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->