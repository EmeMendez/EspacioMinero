$( document ).ready(function() {



  var rut = false;
  var name= false;
  var email = false;
  var region = false;
  var province = false;
  var city = false;
  var address = false;
  var tamanio_empresa = false;
  var tipo_empresa=false;
  var description = false;
  var pass=false;
  var repass=false;


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
  =       FIELD REGION,PROVINCE,CITY VALIDATION           =
  ======================================-->*/
   $("#user_region").change(function(){
      $("#user_region_error").html("&nbsp");
      $("#user_province_error").html("&nbsp");
      $("#user_city_error").html("&nbsp");
      $("#user_region").removeClass("form-control is-invalid");                          
      $("#user_region").addClass("form-control is-valid");
      $("#user_province").removeClass("form-control is-valid form-control is-valid");                                          
      $("#user_city").removeClass("form-control is-valid form-control is-valid");
      region=true;                                           
    
    });
   $("#user_province").change(function(){
      $("#user_province_error").html("&nbsp");
      $("#user_province").removeClass("form-control is-invalid");                          
      $("#user_province").addClass("form-control is-valid"); 
      $("#user_city").removeClass("form-control is-valid form-control is-valid");
      province=true;               
   });
   $("#user_city").change(function(){
      $("#user_city_error").html("&nbsp");
      $("#user_city").removeClass("form-control is-invalid");                          
      $("#user_city").addClass("form-control is-valid");
      city=true;                      
   });

    function valida_region(){
      if($("#user_region").val() == null){
        $("#user_region_error").html("Debe seleccionar una región");
        $("#user_region").addClass("form-control is-invalid");
        region = false;                
      }
      else{
        $("#user_region_error").html("&nbsp");
        $("#user_region").addClass("form-control is-valid");
        region = true;         
      }
    }
    function valida_province(){
      if($("#user_province").val() == null){
        $("#user_province_error").html("Debe seleccionar una provincia");
        $("#user_province").addClass("form-control is-invalid");  
        province = false;              
      }
      else{
        $("#user_province_error").html("&nbsp");
        $("#user_province").addClass("form-control is-valid");
        province = true;                          
      }
    }
    function valida_city(){
      if($("#user_city").val() == null){
        $("#user_city_error").html("Debe seleccionar una ciudad");
        $("#user_city").addClass("form-control is-invalid");
        city = false;
      }
      else{
        $("#user_city_error").html("&nbsp");
        $("#user_city").addClass("form-control is-valid");
        city = true;                          
      }
    }
  /*====  End fIELD REGION, PROVINCE, CITY VALIDATION  ====-->*/


 /*--=====================================
  =       FIELD ADDRESS VALIDATION           =
  ======================================-->*/
  $("#user_address").focusout(function(){
        valida_address();
      });
    $("#user_address").keyup(function(){
        valida_address();
    });
    function valida_address(){
      if($("#user_address").val()==''){             
        $("#user_address_error").html("Debe proporcionar una dirección");
        $("#user_address").addClass("form-control is-invalid");
        address = false;                
      }else{
        $("#user_address_error").html("&nbsp");
        $("#user_address").removeClass("form-control is-invalid");                
        $("#user_address").addClass("form-control is-valid");
        address = true;
      }
    }
  /*====  End fIELD addressVALIDATION  ====-->*/

 /*--===============================================
  =       FIELD tamanio empresa VALIDATION   =
  ==================================================-->*/

  $("#user_tamanio_empresa").change(function(){
      $("#user_tamanio_empresa").removeClass("form-control is-invalid");
      $("#user_tamanio_empresa").addClass("form-control is-valid");
      $("#user_tamanio_empresa_error").html("&nbsp");
    });

    function valida_tamanio_empresa(){
      if($("#user_tamanio_empresa").val() == null){
        $("#user_tamanio_empresa_error").html("Debe seleccionar un tamaño de empresa");
        $("#user_tamanio_empresa").addClass("form-control is-invalid");
        tamanio_empresa=false;
        
      }else{
        $("#user_tamanio_empresa_error").html("&nbsp");
        $("#user_tamanio_empresa").removeClass("form-control is-invalid");
        $("#user_tamanio_empresa").addClass("form-control is-valid");        
        tamanio_empresa=true;
      }      
    }

   /*--===============================================
  =       FIELD tipo empresa VALIDATION   =
  ==================================================-->*/

    $("#user_tipo_empresa").change(function(){
      $("#user_tipo_empresa").removeClass("form-control is-invalid");
      $("#user_tipo_empresa").addClass("form-control is-valid");
      $("#user_tipo_empresa_error").html("&nbsp");
    });

    function valida_tipo_empresa(){
      if($("#user_tipo_empresa").val() == null){
        $("#user_tipo_empresa_error").html("Debe seleccionar un tipo de empresa");
        $("#user_tipo_empresa").addClass("form-control is-invalid");
        tipo_empresa=false;
      }else{
        $("#user_tipo_empresa_error").html("&nbsp");
        $("#user_tipo_empresa").removeClass("form-control is-invalid");
        $("#user_tipo_empresa").addClass("form-control is-valid");   
        tipo_empresa=true;     
      }      
    }

  /*====  End tipo empresa VALIDATION  ====-->*/


   /*--===============================================
  =       FIELD description VALIDATION   =
  ==================================================-->*/

    $("#user_description").focusout(function(){
      valida_description();
    });
    $("#user_description").keyup(function(){
      valida_description();
    });    

    function valida_description(){
      let length = document.getElementById("user_description").value.length;
      if($("#user_description").val()==''){
        $("#user_description_error").html("Debe prorcionar una descripción");
        $("#user_description").addClass("form-control is-invalid");
        description=false;
      }
      else if(length>250){
        $("#user_description_error").html("La descripción no debe superar los 250 caracteres");
        $("#user_description").addClass("form-control is-invalid");
        description=false;
      }
      else{
        $("#user_description_error").html("&nbsp");
        $("#user_description").removeClass("form-control is-invalid");
        $("#user_description").addClass("form-control is-valid");
       description=true;
      }
      //$("#user_description")
    }

    /*====  End description VALIDATION  ====-->*/


   /*--===============================================
  =       FIELD PASSWORD AND REPASSWORD VALIDATION   =
  ==================================================-->*/
  $("#user_pass").focusout(function(){
        valida_pass();
        valida_repass();
      });
    $("#user_pass").keyup(function(){
        valida_pass();
        valida_repass();
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
      valida_region();
      valida_province();
      valida_city();
      valida_address();
      valida_pass();
      valida_repass();
      valida_rut();
      valida_tipo_empresa();
      valida_tamanio_empresa();
      valida_description();
      if(rut&&name&&email&&region&&province&&city&&address&&tamanio_empresa&&tipo_empresa&&description&&pass&&repass){
        $("#user_button_error").html("&nbsp");
      }else{
        $("#user_button_error").html("Hay errores al completar el formulario");
        event.preventDefault();
      }

    });



});