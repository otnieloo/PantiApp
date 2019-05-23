<!DOCTYPE html>
<html lang="en">
<head><?php //include 'head.php'; ?></head>

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
            <section id="team" class="pt-1" >
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Profile</h3>
        </div>

        <div class="row">

          <div class= "wow fadeInUp" style="margin:  0 auto 0 auto;">
            <div class="member mb-0 pb-0">
              <img src="  <?php echo base_url('assets/img/team-1.jpg');?>" class="img-fluid" alt="" style="height: 240px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4><?php echo $info[0]['nama']; ?></h4>
                  <span><?php echo $info[0]['pekerjaan']; ?></span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
                <div class="member">
                  <h4><?php echo $info[0]['nama']; ?></h4>
                  <span><?php echo $info[0]['pekerjaan']; ?></span>
                </div>
          </div>

        </div>
        <table class="table" style="width: 100%;">
              <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama Panti</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Status</th>
    </tr>
              </thead>
              <tbody>
    <tr>
      <th scope="row">1</th>
      <td>20 Mei 2019</td>
      <td>Panti Asuhan</td>
      <td>8juta</td>
      <td>Berhasil</td>
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
