<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  @include('partials.head')
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader" id="loading">
      <div class="preloader-body">
        <div id="loading-center-object">
          <div class="object" id="object_four"></div>
          <div class="object" id="object_three"></div>
          <div class="object" id="object_two"></div>
          <diV class="object" id="object_one"></div>
        </div>
      </div>
    </div>
    <div class="page">
     @include('partials.header');
      @yield('content')
      @include('partials.footer');

    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script> 
  </body>
</html>





