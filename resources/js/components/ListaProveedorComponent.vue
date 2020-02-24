<template>
    <!-- Buscardor proveedor -->
    <div class="container">
      <div class="form-group row">
        <div class="col-sm-2">               
        </div>        <div class="col-sm-7">
          <div class="form-wrap">
             <input @keyup="getProveedoresByName" v-model="parametro" placeholder="Nombre" class="form-input" id="provider-name" type="text" name="user-name" >
          </div>
        </div>
      </div>
    <!-- Fin Buscador --> 
     <!-- inicio de la lista -->
    <p class="h5">[Resultados {{proveedores.length}}]</p>
    
    <div class="card mb-3" v-for="p in proveedores" v-bind:key="p.rut">
      <div class="row no-gutters">
        <div class="col-md-2">
          <img :src="'/storage/' + p.imagen.substr(6)" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title" v-text="p.nombre"></h5>
            <p class="card-text" v-text="p.descripcion"></p>
            <a class="button button-sm button-default-outline button-winona" :href="'/proveedores-perfil/' + p.url"> Más Información</a>            
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
                proveedores: [],
                parametro: ''
            }
        },
        mounted(){
          axios.get('/proveedor/proveedores/json/getproveedores').then(res=>{
            this.proveedores = res.data
          })
        },
        
        methods:{
          getProveedoresByName(){
                try{
                    axios.get('/proveedor/proveedores/json/getproveedores/' + this.parametro).then(res =>{
                    this.proveedores = res.data;
                    })               
                }catch(error){
                    console.log("error obteniendo la lista de proveedores por nombre");
                }
                return this.proveedores;
            }  
        }

    }


</script>