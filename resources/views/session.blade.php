@extends('layout')
@section('content')
<!-- Get in Touch-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <h3 class="text-center">Iniciar Sesión</h3>
    <div class="row justify-content-center">
      <div class="col-lg-11 col-xl-9">
        <!-- RD Mailform-->
        <form class="rd-mailform rd-form ses" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
          <div class="row row-x-16 row-20"  >
            <div class="col-7">
                <div class="form-wrap">
                    <input class="form-input" id="contact-name" type="text" name="user-name" data-constraints="@Required @Email">
                    <label class="form-label" for="contact-name">Rut</label>
                  </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <input class="form-input" id="contact-email" type="password" name="user-pass" data-constraints="@Required @Email">
                        <label class="form-label" for="contact-email">Contraseña</label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="help-block text-right"><a href="">¿Olvidaste tu contraseña?</a></div>
                    </div>
                </div><br>
            <div class="col-md-7">
              <div class="form-wrap form-button">
                <button class="button button-block button-primary" type="submit">Inciar Sesión</button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>

    
  </div>

</section>

@endsection