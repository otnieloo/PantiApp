<!DOCTYPE html>
<html lang="en">
  <body>
    <?php// include 'header_sebelum.php'; ?>
    <main id="main">
      <!--==========================
      Intro Section
      ============================-->
      <section id="intro">
        <div class="intro-container" >
          <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators"></ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <div class="carousel-background"><img src="<?php echo base_url('assets/img/intro-carousel/1.jpg');?>" alt=""></div>
            </div>
            <div class="carousel-item" style="">
              <div class="carousel-background"><img src="  <?php echo base_url('assets/img/intro-carousel/2.jpg');?>" alt=""></div>
              <div class="carousel-container">
              </div>
            </div>
            <div class="carousel-item">
              <div class="carousel-background"><img src="  <?php echo base_url('assets/img/intro-carousel/3.jpg');?>" alt=""></div>
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
      <!--==========================
      Featured Services Section
      ============================-->
      <section id="featured-services" >
        <div class="container w-100" style="padding: 1px; ">
          <div class="row">
            <div class="col-lg-9 col-md-4 box" >
              <!--==========================
              Portfolio Section
              ============================-->
              <section id="portfolio"  class="section-bg pt-1" >
                <div class="container">
                  <header class="section-header">
                    <h3 class="section-title">List Panti</h3>
                  </header>
                  <div class="row">
                    <div class="col-lg-12">
                      <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">Panti Asuhan</li>
                        <li data-filter=".filter-card">Panti Jompo</li>
                        <li data-filter=".filter-web">Panti Sosial</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row portfolio-container">
                    <?php foreach ($info as $i) :
                    ?>
                    <div class="col-lg-4 col-md-4 portfolio-item filter-app wow fadeInUp">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="  <?php echo base_url('assets/img/portfolio/app1.jpg');?>" class="img-fluid" alt="">
                          <a href="  <?php echo base_url('assets/img/portfolio/app1.jpg');?>" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="<?php echo site_url('panti/detail/'.$i['email']) ?>"><?= $i['nama']; ?></a></h4>
                          <p><?= $i['deskripsi'];  ?></p>
                        </div>
                      </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                    <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="  <?php echo base_url('assets/img/portfolio/web3.jpg');?>" class="img-fluid" alt="">
                          <a href="  <?php echo base_url('assets/img/portfolio/web3.jpg');?>" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="#">Web 3</a></h4>
                          <p>Web</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="  <?php echo base_url('assets/img/portfolio/app2.jpg');?>" class="img-fluid" alt="">
                          <a href="  <?php echo base_url('assets/img/portfolio/app2.jpg');?>" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="#">App 2</a></h4>
                          <p>App</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="img/portfolio/card2.jpg" class="img-fluid" alt="">
                          <a href="img/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="#">Card 2</a></h4>
                          <p>Card</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="img/portfolio/web2.jpg" class="img-fluid" alt="">
                          <a href="img/portfolio/web2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="#">Web 2</a></h4>
                          <p>Web</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="img/portfolio/app3.jpg" class="img-fluid" alt="">
                          <a href="img/portfolio/app3.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="#">App 3</a></h4>
                          <p>App</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="img/portfolio/card1.jpg" class="img-fluid" alt="">
                          <a href="img/portfolio/card1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 1" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="#">Card 1</a></h4>
                          <p>Card</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="img/portfolio/card3.jpg" class="img-fluid" alt="">
                          <a href="img/portfolio/card3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 3" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="#">Card 3</a></h4>
                          <p>Card</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.2s">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="img/portfolio/web1.jpg" class="img-fluid" alt="">
                          <a href="img/portfolio/web1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 1" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </figure>
                        <div class="portfolio-info">
                          <h4><a href="#">Web 1</a></h4>
                          <p>Web</p>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
                </section><!-- #portfolio -->
              </div>
              <div class="col-lg-3 box box-bg" style="margin-right: -20px;">
                
                <footer id="footer" style="background: none; padding-bottom: 0;">
                  <div class="footer-top" style="background: none; padding-bottom: 0; padding-top: 0px;">
                    <div class="container" style="padding-top: 0;">
                      <div class="row">
                        <div class="footer-links" style="width: 100%;">
                          <h4>Top Donatur</h4>
                          <ul >
                            <li> <a href="#">1. ....</a></li>
                            <li> <a href="#">2. ...</a></li>
                            <li> <a href="#">3. ....</a></li>
                            <li> <a href="#">4. ...</a></li>
                            <li> <a href="#">5. ....</a></li>
                            <li> <a href="#">6. ...</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  </footer><!-- #footer -->
                  <footer id="footer" style="background: none; " >
                    <div class="footer-top" style="background: none; margin-top: 0; padding-top: 0;">
                      <div class="container">
                        <div class="row">
                          <div class="footer-links" style="width: 100%;">
                            <h4>Top Donated</h4>
                            <ul >
                              <li><i class="ion-ios-arrow-right" style="font-size: 15px;"></i> <a href="#">Home</a></li>
                              <li><i class="ion-ios-arrow-right" style="font-size: 15px;"></i> <a href="#">About us</a></li>
                              <li><i class="ion-ios-arrow-right" style="font-size: 15px;"></i> <a href="#">Services</a></li>
                              <li><i class="ion-ios-arrow-right" style="font-size: 15px;"></i> <a href="#">Terms of service</a></li>
                              <li><i class="ion-ios-arrow-right" style="font-size: 15px;"></i> <a href="#">Privacy policy</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    </footer><!-- #footer -->
                  </div>
                </div>
              </div>
              </section><!-- #featured-services -->

              <div id="id01" class="modal">
                
                <?php echo form_open('panti/login', 'class="modal-content animate"'); ?>
                <div class="container">
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    
                    <button type="submit">Login</button>
                    
                  </div>
                  <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Belum Punya Akun? <a href="daftar.php">daftar!</a></span><br>
                  </div>
                </form>
              </div>

              <div id="id02" class="modal">
                
                <?php form_open('panti/login', 'class="modal-content animate"'); ?>
                <form class="modal-content animate" action="/action_page.php">
                  <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    
                    <button type="submit">Login</button>
                    <label>
                      <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                  </div>
                  <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Belum Punya Akun? <a href="daftar.php">daftar!</a></span><br>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                    
                  </div>
                </form>
              </div>


              <script>
              // Get the modal
              var modal = document.getElementById('id01');
              // When the user clicks anywhere outside of the modal, close it
              window.onclick = function(event) {
                if (event.target == modal) {
                modal.style.display = "none";
              }
              }
              </script>
            </main>
          </body>
        </html>