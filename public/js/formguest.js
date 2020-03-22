$( document ).ready(function() {



    var rut = false;
    var name= false;
    var email = false;
    var ocupacion = false;
    var pass=false;
    var repass=false;
    var otro=false;
    var phone=false;
  
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
    =       FIELD TELEFONO VALIDATION           =
    ======================================-->*/
    $("#user_phone").focusout(function(){
        valida_phone();
      });
    $("#user_phone").keyup(function(){
        valida_phone();
    });
    function valida_phone(){
      if($("#user_phone").val()==''){ 
        $("#user_phone_error").html("Debe proporcionar un telefono");
        $("#user_phone").addClass("form-control is-invalid");
        phone = false;
      }else{
        $("#user_phone_error").html("&nbsp");
        $("#user_phone").removeClass("form-control is-invalid");
        $("#user_phone").addClass("form-control is-valid");
        phone = true;

      }
    }
  /*====  End fIELD TELEFONO VALIDATION  ====-->*/
  
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
  
  
      /*--=====================================
    =       FIELD OCUPACION         =
    ======================================-->*/

    $("#user-ocupacion").change(function(){
        $("#user-ocupacion").removeClass("form-control is-invalid");
        $("#user-ocupacion").addClass("form-control is-valid");
        $("#user_ocupacion_error").html("&nbsp");
        if($("#user-ocupacion").val() == 4){
            $("#opcion").removeClass("d-none");
            $("#opcion").addClass("d-block");
        }else{
            $("#opcion").removeClass("d-block");
            $("#opcion").addClass("d-none");
        }

      });
  
      function valida_ocupacion(){
        if($("#user-ocupacion").val() == null){
          $("#user_ocupacion_error").html("Debe seleccionar una ocupacion");
          $("#user-ocupacion").addClass("form-control is-invalid");
          ocupacion=false;
          
        }else{
          $("#user_ocupacion_error").html("&nbsp");
          $("#user-ocupacion").removeClass("form-control is-invalid");
          $("#user-ocupacion").addClass("form-control is-valid");        
          ocupacion=true;
        }      


        if($("#user-ocupacion").val() != 4 && $("#user-otro").empty() ){
          console.log('si entre uwu');
          otro=true;
        }
      }
    /*====  End fIELD OCUPACION ====-->*/

    /*--=====================================
    =       FIELD OTRO VALIDATION           =
    ======================================-->*/
    $("#user_otro").focusout(function(){
        valida_otro();
      });
    $("#user_otro").keyup(function(){
        valida_otro();
    });
    function valida_otro(){
      if($("#user_otro").val()==''){ 
        $("#user_otro_error").html("Debe proporcionar un nombre");
        $("#user_otro").addClass("form-control is-invalid");
        otro=false;
      }else{
        $("#user_otro_error").html("&nbsp");
        $("#user_otro").removeClass("form-control is-invalid");
        $("#user_otro").addClass("form-control is-valid");
        otro = true;

      }
    }
  
     /*--===============================================
    =       FIELD PASSWORD AND REPASSWORD VALIDATION   =
    ==================================================-->*/
    $("#user_pass").focusout(function(){
          valida_pass();
          valida_repass();
          valida_pass_be();
        });
  
      $("#user_pass").keyup(function(){
          valida_pass_be();
          valida_pass();
          valida_repass();
  
      }); 
  
      $("#user_pass_be").focusout(function(){
        valida_pass_be();
      });
  
      $("#user_pass_be").keyup(function(){
          valida_pass_be();
      });
  
      $("#user_repass").keyup(function(){
          valida_repass();
      });
      $("#user_repass").focusout(function(){
          valida_repass();
        });
      function valida_pass(){
        var length = document.getElementById("user_pass").value.length;
        if($("#user_pass").val()==''){             
          $("#user_pass_error").html("Debe proporcionar una contraseña");
          $("#user_pass").addClass("form-control is-invalid");  
          pass=false;              
        }else if(length<8){
          $("#user_pass_error").html("Contraseña debe tener al menos 8 caracteres");
          $("#user_pass").addClass("form-control is-invalid"); 
          pass=false;               
        }else{
          $("#user_pass_error").html("&nbsp");
          $("#user_pass").removeClass("form-control is-invalid");                
          $("#user_pass").addClass("form-control is-valid"); 
          pass=true;               
        }     
      }
      function valida_pass_be(){
        var length = document.getElementById("user_pass_be").value.length;
        if($("#user_pass_be").val()==''){             
          $("#user_pass_be_error").html("Debe proporcionar una contraseña");
          $("#user_pass_be").addClass("form-control is-invalid");  
          pass=false;              
        }else if(length<8){
          $("#user_pass_be_error").html("Contraseña debe tener al menos 8 caracteres");
          $("#user_pass_be").addClass("form-control is-invalid"); 
          pass=false;               
        }else{
          $("#user_pass_be_error").html("&nbsp");
          $("#user_pass_be").removeClass("form-control is-invalid");                
          $("#user_pass_be").addClass("form-control is-valid"); 
          pass=true;               
        }     
      }
      function valida_repass(){
        if($("#user_pass").val() != $("#user_repass").val()){
          $("#user_repass_error").html("Las contraseñas no coinciden");  
          $("#user_repass").addClass("form-control is-invalid");  
          repass=false;                    
        }
        else if($("#user_repass").val()==''){
          $("#user_repass_error").html("Las contraseñas no coinciden");  
          $("#user_repass").addClass("form-control is-invalid");
          repass=false;
        }
        else if(document.getElementById("user_repass").value.length<8){
          $("#user_repass_error").html("Contraseña debe tener al menos 8 caracteres");  
          $("#user_repass").addClass("form-control is-invalid");
          repass=false;
        }
        else{
          $("#user_repass_error").html("&nbsp"); 
          $("#user_repass").removeClass("form-control is-invalid");
          $("#user_repass").addClass("form-control is-valid"); 
          repass=true;                                      
        } 
      }
    /*====  End fIELD repass VALIDATION  ====-->*/




  
    $("#user_button").hover(function(){
          $("#user_button_error").html("&nbsp");
    });
  
      $("#user_button").click(function(){
        valida_name();
        valida_email();
        valida_otro();
        valida_ocupacion();
        valida_phone();
        valida_pass();
        valida_repass();
        valida_rut();
        if(rut&&name&&email&&ocupacion&&otro&&phone&&pass&&repass){
          $("#user_button_error").html("&nbsp");
        }else{
          $("#user_button_error").html("Hay errores al completar el formulario");
          event.preventDefault();
        }
  
      });
  
  
  
  });