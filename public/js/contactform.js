$( document ).ready(function() {



    var rut = false;
    var name= false;
    var email = false;
    var mensaje = false;

  
    /*--=====================================
    =       FIELD rut VALIDATION           =
    ======================================-->*/
    var Fn = {
      // Valida el rut con su cadena completa "XXXXXXXX-X"
      validaRut : function (rutCompleto) {
          rutCompleto = rutCompleto.replace("‐","-");
          if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
              return false;
          var tmp     = rutCompleto.split('-');
          var digv    = tmp[1]; 
          var rut     = tmp[0];
          if ( digv == 'K' ) digv = 'k' ;
  
          return (Fn.dv(rut) == digv );
      },
      dv : function(T){
          var M=0,S=1;
          for(;T;T=Math.floor(T/10))
              S=(S+T%10*(9-M++%6))%11;
          return S?S-1:'k';
      }
  }
  
  
  function valida_rut(){
      if (Fn.validaRut( $("#user_rut").val() )){
        $("#user_rut_error").html("&nbsp");
        $("#user_rut").removeClass("form-control is-invalid");
        $("#user_rut").addClass("form-control is-valid");
        rut = true;
      }
      else if($("#user_rut").val() ==''){
        $("#user_rut_error").html("Debe ingresar un rut");
        $("#user_rut").addClass("form-control is-invalid");
        rut = false;
      }
       else {
        $("#user_rut_error").html("Rut inválido, ingrese rut sin puntos y con guión");
        $("#user_rut").addClass("form-control is-invalid");
        rut = false;
  
      }
    }
  
    $("#user_rut").keyup(function(){
      valida_rut();   
    });
    $("#user_rut").focusout(function(){
      valida_rut();   
    });
    /*====  End fIELD rut VALIDATION  ====-->*/
  
  
    /*--=====================================
    =       FIELD NAME VALIDATION           =
    ======================================-->*/
      $("#user_name").focusout(function(){
          valida_name();
        });
      $("#user_name").keyup(function(){
          valida_name();
      });
      function valida_name(){
        if($("#user_name").val()==''){ 
          $("#user_name_error").html("Debe proporcionar un nombre");
          $("#user_name").addClass("form-control is-invalid");
          name = false;
        }else{
          $("#user_name_error").html("&nbsp");
          $("#user_name").removeClass("form-control is-invalid");
          $("#user_name").addClass("form-control is-valid");
          name = true;
  
        }
      }
    /*====  End fIELD NAME VALIDATION  ====-->*/

        /*--=====================================
    =       FIELD NAME VALIDATION           =
    ======================================-->*/
    $("#user_mensaje").focusout(function(){
        valida_mensaje();
      });
    $("#user_mensaje").keyup(function(){
        valida_mensaje();
    });
    function valida_mensaje(){
      if($("#user_mensaje").val()==''){ 
        $("#user_mensaje_error").html("Debe proporcionar un mensaje");
        $("#user_mensaje").addClass("form-control is-invalid");
        mensaje = false;
      }else{
        $("#user_mensaje_error").html("&nbsp");
        $("#user_mensaje").removeClass("form-control is-invalid");
        $("#user_mensaje").addClass("form-control is-valid");
        mensaje = true;

      }
    }
  /*====  End fIELD NAME VALIDATION  ====-->*/


  
    /*--=====================================
    =       FIELD EMAIL VALIDATION           =
    ======================================-->*/
  
    $("#user_email").focusout(function(){
        valida_email();      
      });
  
    $("#user_email").keyup(function(){
        valida_email();
    });
  
    function valida_email(){
      let regular_expressions = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if($("#user_email").val() ==''){
        $("#user_email_error").html("Debe proporcionar un correo electrónico");
        $("#user_email").addClass("form-control is-invalid");  
        email = false;    
      }
      else if(!$("#user_email").val().match(regular_expressions)){
        $("#user_email_error").html("Correo electrónico debe tener un formato correcto");
        $("#user_email").addClass("form-control is-invalid");
        email = false;
            
      }else{
        $("#user_email_error").html("&nbsp"); 
        $("#user_email").removeClass("form-control is-invalid");
        $("#user_email").addClass("form-control is-valid");  
        email = true;                  
      }
    }
    /*====  End fIELD EMAIL VALIDATION  ====-->*/
  
  
  




  
    $("#user_button").hover(function(){
          $("#user_button_error").html("&nbsp");
    });
  
      $("#user_button").click(function(){
        valida_name();
        valida_email();
        valida_mensaje();
        valida_rut();
        if(rut&&name&&email&&mensaje){
          $("#user_button_error").html("&nbsp");
        }else{
          $("#user_button_error").html("Hay errores al completar el formulario");
          event.preventDefault();
        }
  
      });
  
  
  
  });