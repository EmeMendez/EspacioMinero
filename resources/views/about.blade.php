@extends('layout')
@section('content')
<section class="breadcrumbs-custom">
  <section class="section parallax-container breadcrumbs-custom-main context-dark" data-parallax-img="images/bg-image-1.jpg">
    <div class="parallax-content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-9">
            <h3 class="breadcrumbs-custom-title">A Few Words About Us</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="breadcrumbs-custom-aside">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="index.html">Home</a></li>
        <li class="active">About Us</li>
      </ul>
    </div>
  </div>
</section>
Hola Mundo
<!-- Who we Are-->
<section class="section section-md">
  <div class="container">
    <div class="row row-50 align-items-center">
      <div class="col-lg-6">
        <h3>We're a passionate team of marketing experts</h3>
        <p>Ei sumo eruditi sadipscing nec, scripta epicurei ut eam. Duo ut fastidii platonem, eu soleat salutandi neglegentur est. Erant harum malorum eum ne, his ut scaevola consectetuer, duo ex suavitate liberavisse. Has brute graecis an, quis docendi ad ius.</p>
        <!-- Quote Light-->
        <blockquote class="quote-light quote-light_1">
          <div class="quote-light-mark linearicons-quote-open"></div>
          <div class="quote-light-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros ac finibus congue. Integer consectetur, lorem nec</p>
          </div>
        </blockquote>
      </div>
      <div class="col-lg-6"><img src="images/about-1-635x455.png" alt="" width="635" height="455"/>
      </div>
    </div>
  </div>
</section>

<!-- About-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <div class="isotope row row-30" data-isotope-layout="masonry" data-isotope-group="about">
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-1">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content">
            <div class="box-custom-1">
              <h2>Projects</h2>
              <h4>that we work on</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-8 isotope-item">
        <div class="block-ratio block-ratio-3">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/about-1-770x426.jpg);"></div><a href="#">Online Marketing</a>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-2">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/about-2-369x432.jpg);"></div><a href="#">Social Media Marketing</a>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-1">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/about-3-370x251.jpg);"></div><a href="#">Brand Reputation Management</a>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-1">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/about-4-370x251.jpg);"></div><a href="#">Contextual Advertising</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services-->
<section class="section text-center">
  <div class="container">
    <div class="list-blocks-outer">
      <div class="list-blocks">
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-email-outline"></div>
            <p class="list-blocks-title">Creative Space</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-comment-text-outline"></div>
            <p class="list-blocks-title">Copywriting</p>
            <p>Ei sumo eruditi praesent sadipscing nec, scripta epicurei ut eam.</p>
          </div>
        </div>
        <div class="list-blocks-item list-blocks-item_caption">
          <div class="list-blocks-item-inner">
            <h3>Services</h3>
            <p>What we do</p><a class="button button-primary button-winona" href="contacts.html">Get a Quote</a>
          </div>
        </div>
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-magnify"></div>
            <p class="list-blocks-title">Research</p>
            <p>Vel nihil praesent oportere ei. Fugit option oportere est in, te</p>
          </div>
        </div>
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-clipboard-outline"></div>
            <p class="list-blocks-title">Analytics</p>
            <p>Te partem omnesque eligendi has, nam ex persius lobortis.</p>
          </div>
        </div>
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-flag-outline"></div>
            <p class="list-blocks-title">Sales Growth</p>
            <p>Ei tollit euismod cum, augue labore euripidis mel ex, ut</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Team-->
<section class="section section-md bg-gray-100 text-center">
  <div class="container">
    <h3>Our Team</h3>
    <!-- Owl Carousel-->
    <div class="owl-carousel owl-carousel_profile-modern" data-items="1" data-sm-items="2" data-lg-items="3" data-xl-items="4" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false">
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/team-1-369x315.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">Jane Logan</h5>
            <p class="profile-modern-position">Founder &amp; CEO</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Get in Touch</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/team-2-369x315.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">Michael Lee</h5>
            <p class="profile-modern-position">Marketing Analyst</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Get in Touch</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/team-3-369x315.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">Kate Wilson</h5>
            <p class="profile-modern-position">Advertising Expert</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Get in Touch</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/team-4-369x315.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">Jake Watson</h5>
            <p class="profile-modern-position">Brand Manager</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Get in Touch</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/team-6-369x315.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">James Smith</h5>
            <p class="profile-modern-position">Copywriter</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Get in Touch</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/team-5-369x315.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">Phillip Smith</h5>
            <p class="profile-modern-position">SMM Expert</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Get in Touch</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/team-3-369x315.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">Kate Wilson</h5>
            <p class="profile-modern-position">Advertising Expert</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Get in Touch</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/team-2-369x315.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">Michael Lee</h5>
            <p class="profile-modern-position">Marketing Analyst</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Get in Touch</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- How we work-->
<section class="section oh">
  <div class="container">
    <div class="row justify-content-center justify-content-lg-between">
      <div class="col-md-10 col-lg-5 col-xl-4">
        <div class="section-md">
          <h3>How we work</h3>
          <p class="offset-top-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros ac finibus congue. Integer consectetur</p><a class="button button-primary button-winona" href="#">Read More</a>
        </div>
      </div>
      <div class="col-md-10 col-lg-7">
        <!-- Timeline-->
        <div class="timeline-classic timeline-classic_1">
          <div class="timeline-classic-item">
            <div class="timeline-classic-item-inner">
              <div class="timeline-classic-item-decoration"></div>
              <div class="timeline-classic-counter">Initial Consultation</div>
              <div class="timeline-classic-text">
                <p>Pellentesque placerat eros ac finibus congue. Integer consectetur, lorem nec accumsan commodo, sem mauris.</p>
              </div>
            </div>
          </div>
          <div class="timeline-classic-item">
            <div class="timeline-classic-item-inner">
              <div class="timeline-classic-item-decoration"></div>
              <div class="timeline-classic-counter">Task Analysis</div>
              <div class="timeline-classic-text"></div>
              <p>Ei sumo eruditi sadipscing nec, scripta epicurei ut eam. Duo ut fastidii platonem, eu soleat salutandi neg</p>
            </div>
          </div>
          <div class="timeline-classic-item">
            <div class="timeline-classic-item-inner">
              <div class="timeline-classic-item-decoration"></div>
              <div class="timeline-classic-counter">Campaign Development</div>
              <div class="timeline-classic-text"></div>
              <p>Vel nihil percipitur ei. Fugit option oportere est in, te dignissim philosophia mea, duo diceret eruditi ea</p>
            </div>
          </div>
          <div class="timeline-classic-item">
            <div class="timeline-classic-item-inner">
              <div class="timeline-classic-item-decoration"></div>
              <div class="timeline-classic-counter">Achieving Results</div>
              <div class="timeline-classic-text"></div>
              <p>Te partem omnesque eligendi has, nam ex persius lobortis. His ex amet facilis, ne vix diceret dolorum.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials-->
<div class="section-lg bg-accent bg-accent text-center">
  <div class="container">
    <h3>Testimonials</h3>
    <div class="owl-carousel owl-carousel_type-1" data-items="1" data-dots="true" data-nav="true" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false">
      <!-- Quote Classic-->
      <blockquote class="quote-classic"><img class="quote-classic-avatar" src="images/testimonials-1-102x102.jpg" alt="" width="102" height="102"/>
        <div class="quote-classic-text">
          <p>Ut velit ocurreret consequuntur sed, his atqui officiis inimicus cu. Vix ei munere persecuti incorrupte. Pri erat neglegentur eu, te qui admodum mandamus constituto, ad vis tale tibique. Mei possim</p>
        </div>
        <div class="quote-classic-meta">
          <cite class="quote-classic-cite">Alice Doe</cite>
          <p class="quote-classic-position">Regular Client</p>
        </div>
      </blockquote>
      <!-- Quote Classic-->
      <blockquote class="quote-classic"><img class="quote-classic-avatar" src="images/testimonials-2-102x102.jpg" alt="" width="102" height="102"/>
        <div class="quote-classic-text">
          <p>Cu facer nobis feugait mel, his velit tation ea, ut zril legimus postulant vix. Ad ipsum oblique est, ea laudem putant eam. Habeo doming feugait has eu. Et essent principes reprimique sea, quaestio</p>
        </div>
        <div class="quote-classic-meta">
          <cite class="quote-classic-cite">John Williams</cite>
          <p class="quote-classic-position">Regular Client</p>
        </div>
      </blockquote>
      <!-- Quote Classic-->
      <blockquote class="quote-classic"><img class="quote-classic-avatar" src="images/testimonials-3-102x102.jpg" alt="" width="102" height="102"/>
        <div class="quote-classic-text">
          <p>Vide etiam apeirian qui cu, ex sea habemus eligendi assentior. Et adversarium instructior per. Ad tale saepe pri, quo te melius principes. Iudico tempor vis in. Vel laudem appareat singulis et, eum</p>
        </div>
        <div class="quote-classic-meta">
          <cite class="quote-classic-cite">Scott Johnson</cite>
          <p class="quote-classic-position">Regular Client</p>
        </div>
      </blockquote>
    </div>
  </div>
</div>

<!-- Our Clients-->
<section class="section section-md bg-gray-100 text-center">
  <div class="container">
    <h3>Our Clients</h3>
    <!-- Owl Carousel-->
    <div class="owl-carousel owl-carousel-centered" data-items="2" data-sm-items="3" data-md-items="4" data-lg-items="5" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false">
      <div class="wow clipInLeft"><a class="link-image-1" href="#"><img src="images/investor-1-88x77.png" alt="" width="88" height="77"/></a></div>
      <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="images/investor-2-73x78.png" alt="" width="73" height="78"/></a></div>
      <div class="wow clipInLeft" data-wow-delay=".2s"><a class="link-image-1" href="#"><img src="images/investor-3-96x62.png" alt="" width="96" height="62"/></a></div>
      <div class="wow clipInLeft" data-wow-delay=".3s"><a class="link-image-1" href="#"><img src="images/investor-4-78x80.png" alt="" width="78" height="80"/></a></div>
      <div class="wow clipInLeft" data-wow-delay=".4s"><a class="link-image-1" href="#"><img src="images/investor-5-87x76.png" alt="" width="87" height="76"/></a></div>
    </div>
  </div>
</section>
@endsection