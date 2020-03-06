<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  @include('partials.head')
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="Estas usando un navegador pre-historico. Actualizate rápido y fácil ahora."></a></div>
    <div class="preloader" id="loading">
    
      </div>
    <div class="page">
     @include('partials.header')
      @yield('content')
      @include('partials.footer')

    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="/js/core.min.js"></script>
    <script src="/js/script.js"></script> 
    <script src="/js/app.js"></script> 


  </body>
</html>





