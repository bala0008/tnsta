  <div class="container">
    <div id="banner-section">
      <div class="carousel">
        <div class="carousel-inner">
          <div class="slide active">
            <img src="slide/carousel/banner1.jpg" class="img-fluid">
          </div>
          <div class="slide">
            <img src="slide/carousel/banner2.jpg" class="img-fluid">
          </div>
          <div class="slide">
            <img src="slide/carousel/banner3.jpg" class="img-fluid">
          </div>
          <div class="slide">
            <img src="slide/carousel/banner4.png" class="img-fluid">
          </div>

        </div>
        <div class="arrow arrow-left"></div>
        <div class="arrow arrow-right"></div>
      </div>
    </div>
  </div>
  <section class="bg-nav">
    <div class="container title-update">
      <div class="d-flex d-flex-space-between marquee-text  d-flex-align-center">
       
        <marquee class="update-marquee" scrollamount="2" onmouseover="stop()" onkeydown="start()" onblur="" onfocus="start()" onmouseout="start()" width="95%">This example will take only 50% width</marquee>
      </div>
    </div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
    // Custom options for the carousel
    var args = {
      arrowRight: '.arrow-right',
      arrowLeft: '.arrow-left',
      speed: 700,
      slideDuration: 4000
    };
    // start BannerSlide
    $('.carousel').BannerSlide(args);
  </script>

  </html>