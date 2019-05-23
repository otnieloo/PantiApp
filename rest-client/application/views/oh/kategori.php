<!DOCTYPE html>
<html lang="en">
<head><?php //include 'head.php'; ?></head>

<body>
<!--Header--><?php //include 'header.php'; ?><!-- #header -->

  <main id="main">

<!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio" style="background: rgba(0,0,0,0.9);" >
      <div class="container">

        <header class="section-header" >
          <h3 class="section-title" style="color: white;  margin-top: 3em;">List Panti </h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-asuhan">Panti Asuhan</li>
              <li data-filter=".filter-jompo">Panti Jompo</li>
              <li data-filter=".filter-sosial">Panti Sosial</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <?php foreach ($info as $i) : ?>
            <div class="col-lg-4 col-md-6 portfolio-item <?php echo 'filter-'.$i['jenis']; ?> wow fadeInUp">
              <div class="portfolio-wrap">
                <figure style="height: 220px;">
                  <img src="  <?php echo base_url('assets/img/portfolio/app1.jpg');?>" class="img-fluid" alt="">
                  <a href="  <?php echo base_url('assets/img/portfolio/app1.jpg');?>" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </figure>

                <div class="portfolio-info">
                  <h4><a href="<?php echo site_url('oh/detail/'.$i['email']); ?>"><?php echo $i['nama']; ?></a></h4>
                  <p><?php echo $i['deskripsi']; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

      </div>
    </section><!-- #portfolio -->
  </main>


  <!-- JavaScript Libraries -->
  <?php //include 'js.php'; ?>

</body>
</html>
