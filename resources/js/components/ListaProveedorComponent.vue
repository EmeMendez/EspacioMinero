<template>
    <!-- Buscardor proveedor -->
    <div class="container">
      <div class="form-group row">
        <div class="col-sm-2">               
        </div>        
        <div class="col-sm-7">
          <div class="form-wrap">
             <input @keyup="getProveedoresByName" v-model="parametro" placeholder="Nombre" class="form-input" id="provider-name" type="text" name="user-name" >
          </div>
        </div>
      </div>
    <!-- Fin Buscador --> 
     <!-- inicio de la lista -->
    <label class="lead pb-3">Resultados : {{resultados}}</label>
    
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
    <div v-if="resultados != 0" class="row ">
        <button  @click="changePage(n)" class="btn mx-2" :class="{
          'btn-secondary' :n != page,
          'btn-primary' :n == page
        }" v-for="(n,index) in this.total_pages" :key="index">{{n}}

        </button>
    </div>
    </div>

  

</template>



<script>
	
	    export default {
        data(){
            return {
                proveedores: [],
                parametro: '',
                total_pages : null,
                page: 1,
                resultados: 0
            }
        },
        mounted(){
          this.getProveedoresByName()
        },
        
        methods:{
          getProveedoresByName(){
                try{
                    if(this.parametro != ''){
                        axios.get('/proveedor/proveedores/json/getproveedores/' + this.parametro + '?page=1').then(res =>{
                        this.proveedores = res.data.data;
                        this.total_pages = res.data.last_page
                        this.resultados = res.data.total

                        }) 

                    }else{
                        axios.get('/proveedor/proveedores/json/getproveedores/*?page=' + this.page).then(res=>{
                        this.proveedores = res.data.data                       
                        this.total_pages = res.data.last_page
                        this.resultados = res.data.total



          })
                    }              
                }catch(error){
                    console.log("error obteniendo la lista de proveedores por nombre");
                }
                return this.proveedores;
            },
        changePage(n){
          this.page = n
          this.getProveedoresByName()
        }
            
        }

    }


</script>