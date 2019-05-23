<!DOCTYPE html>
<html lang="en">
<head><?php include 'head.php'; ?></head>

<body style="background: black;">
   <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">Donasi</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>
    </div>
  </header><!-- #header -->

  <main id="main" ">

 <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp" style="margin-top: 5em; margin-left: 7em;margin-right:  7em;">
      <div class="container">

        <div class="section-header">
          <h3>Register</h3>
        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="nama" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No. Hp" data-rule="email" data-msg="Masukkan No Telepon" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="alamat" rows="5" data-rule="required" data-msg="Tuliskan alamat anda" placeholder="Tuliskan alamat anda"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Daftar</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
        <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BizPage</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <?php include 'js.php'; ?>

</body>
</html>
