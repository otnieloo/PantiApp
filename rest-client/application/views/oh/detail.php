<!DOCTYPE html>
<html lang="en">
<head><?php //include 'head.php'; ?>
</head>

<body>
<!--Header--><?php //include 'header.php'; ?><!-- #header -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services" style="padding-top: 4.3em;">
      <div class="container">
        <div class="row">

          <div class="col-lg-12 col-md-4 box" >
              <!--==========================
            Team Section
            ============================-->
            <section id="team" style=" padding-top: 10px; ">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Detail Panti <?php echo $info[0]['nama']; ?></h3>
        </div>

         <!--==========================
              Intro Section
              ============================-->
              <section id="intro" style="height: 23em;">
                <div class="intro-container" >
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="height: 23em;">
            <div class="carousel-background"><img src="img/intro-carousel/1.jpg" alt=""></div>
          </div>

          <div class="carousel-item" style="height: 23em;">
            <div class="carousel-background"><img src="img/intro-carousel/2.jpg" alt=""></div>
            <div class="carousel-container">
            </div>
          </div>

          <div class="carousel-item" style="height: 23em;">
            <div class="carousel-background"><img src="img/intro-carousel/3.jpg" alt=""></div>
            <div class="carousel-container">
            </div>
          </div>          

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
                </div>
              </section><!-- #intro -->


               <div class="table-responsive mt-5">
              <table class="table table-borderless detail">
                <tr>
                  <th style="width: 9em;">Nama Panti</th>
                  <td><?php echo $info[0]['nama']; ?></td>
                </tr>
                <tr>
                  <th>Jenis</th>
                  <td><?php echo $info[0]['jenis']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $info[0]['email']; ?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><?php echo $info[0]['alamat']; ?></td>
                </tr>
                <tr>
                  <th>Penghuni</th>
                  <td><?php echo $info[0]['penghuni']; ?></td>
                </tr>
                <tr>
                  <th>Deskripsi</th>
                  <td><?php echo $info[0]['deskripsi']; ?></td>
                </tr>
               <tr>
                  <th>Total Donasi</th>
                  <td>-</td>
                </tr>
                
              </table>
            </div>
            
            <table class="table" style="width: 70%;">
              <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama Donatur</th>
      <th scope="col">Jumlah</th>
    </tr>
              </thead>
              <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
              </tbody>
            </table>
          
      </div>
            </section><!-- #team -->

          </div>
        </div>
      </div>
    </section><!-- #featured-services -->
  </main>

  <!-- JavaScript Libraries -->
  <?php //include 'js.php'; ?>

</body>
</html>
