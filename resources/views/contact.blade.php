@extends('layout')
@section('content')
<section class="breadcrumbs-custom">
  <section class="section parallax-container breadcrumbs-custom-main context-dark" data-parallax-img="images/bg-image-1.jpg">
    <div class="parallax-content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-9">
            <h2 class="breadcrumbs-custom-title">Contacts</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="breadcrumbs-custom-aside">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="index.html">Home</a></li>
        <li class="active">Contacts</li>
      </ul>
    </div>
  </div>
</section>
<section class="section section-md">
  <div class="container">
    <div class="row row-50">
      <div class="col-xl-5">
        <div class="inset-1">
          <h2>Our Contacts</h2>
          <p class="big">If you are living nearby, come visit us at one of our comfortable offices.</p>
          <div class="row row-50">
            <div class="col-sm-6 col-xl-12">
              <p class="heading-7">Office 1</p>
              <ul class="list list-style-1">
                <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-map-marker"></span>
                  <div class="unit-body"><a href="#">9863 - 9867 Mill Road, Cambridge, MG09 99HT</a></div>
                </li>
                <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-cellphone"></span>
                  <div class="unit-body"><a href="tel:#">+1 800 603 6035</a></div>
                </li>
                <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-email-outline"></span>
                  <div class="unit-body"><a class="text-primary" href="mailto:#">mail@demolink.org</a></div>
                </li>
              </ul>
            </div>
            <div class="col-sm-6 col-xl-12">
              <p class="heading-7">Office 2</p>
              <ul class="list list-style-1">
                <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-map-marker"></span>
                  <div class="unit-body"><a href="#">9870 St Vincent Place, Glasgow, DC 45 Fr 45</a></div>
                </li>
                <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-cellphone"></span>
                  <div class="unit-body"><a href="tel:#">+1 800 603 6035</a></div>
                </li>
                <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-email-outline"></span>
                  <div class="unit-body"><a class="text-primary" href="mailto:#">mail@demolink.org</a></div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-7">
        <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="5" data-styles="[{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#444444&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:45}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#46bcec&quot;},{&quot;visibility&quot;:&quot;on&quot;}]}]" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png">
          <div class="google-map"></div>
          <ul class="google-map-markers"> 
            <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Get in Touch-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <h3 class="text-center">Get in Touch</h3>
    <div class="row justify-content-center">
      <div class="col-lg-11 col-xl-9">
        <!-- RD Mailform-->
        <form class="rd-mailform rd-form" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
          <div class="row row-x-16 row-20">
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="contact-name">Your Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                <label class="form-label" for="contact-email">Email</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <label class="form-label" for="contact-message">Message</label>
                <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@PhoneNumber">
                <label class="form-label" for="contact-phone">Phone</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap form-button">
                <button class="button button-block button-primary" type="submit">Send Message</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection