<template>
    <!-- Buscardor proveedor -->
    <div class="container">
      <div class="form-group row">
        <div class="col-sm-2">               
        </div>        <div class="col-sm-7">
          <div class="form-wrap">
            <input placeholder="Nombre" class="form-input" id="provider-name" type="text" name="user-name" >
          </div>
        </div>
          <div class="col-sm-3">
            <div class="form-wrap">
              <a class="button button-sm button-default-outline button-winona" href="#"> Buscar Proveedor</a>            
            </div>                   
          </div>
      </div>
    <!-- Fin Buscador --> 
     <!-- inicio de la lista -->
    <p class="h5">[Resultados {{proveedores.length}}]</p>
    
    <div class="card mb-3">
      <div class="row no-gutters">
        <div class="col-md-2">
          <img src="https://www.cidere.cl//sites/default/files/gbb-uploads/Logo800x600-ta2vqm.png" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Nombre del Proveedor</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a class="button button-sm button-default-outline button-winona" href="#"> Más Información</a>            
          </div>
        </div>
      </div>
    </div> 
    <!-- end list -->

    </div>


</template>



<script>
    export default {
        data(){
            return {
                proveedores: []
            }
        },
        mounted(){
                    axios.get('/proveedor/proveedores').then(res =>{
                    this.proveedores = res.data;
                    console.log(this.proveedores);

                    })        
        },
        computed:{
            getProveedoresNow(){
                try{
                    axios.get('/proveedor/proveedores').then(res =>{
                    this.proveedores = res.data;
                    console.log("llegue al catch");

                    })               
                }catch(error){
                    console.log("llegue al catch");
                }
                return this.proveedores;
            }           
        }

    }
</script>