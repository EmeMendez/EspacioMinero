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
    <label id="results" class="lead pb-3">Resultados : {{pagination.total}}</label>
    
    <div class="card mb-3" v-for="p in proveedores" v-bind:key="p.rut">
      <div class="row no-gutters">
        <div class="col-md-2 col-12 text-center my-auto">
          <img :src="'/storage/' + p.imagen.substr(6)" width="150" height="150">
        </div>
        <div class="col-md-8 col-12">
          <div class="card-body">
            <h5 class="card-title" v-text="p.nombre"></h5>
            <p class="card-text multine-ellipsis text-justify"  v-text="p.descripcion"></p>
            <a class="button button-sm button-default-outline button-winona ml-0" :href="'/proveedores-perfil/' + p.url"> Más Información</a>            
          </div>
        </div>
      </div>
    </div> 
    <!-- end list -->

    <!-- start buttons -->
      <nav>
        <ul class="pagination">
          <li to="results" :class="{'page-item disabled' : pagination.current_page == 1,
          'page-item' : pagination.current_page > 1
           }"  class="page-item"><a  href="#" @click.prevent="changePage(pagination.current_page -1)" class="page-link"><span>&laquo;</span></a></li>
          
          <li v-for="page in pagesNumber" :key="page" :class="[ page == isActived ? 'active' : 'page-item' ]" class="page-item">
            <a href="#" class="page-link" @click.prevent="changePage(page)">{{page}}</a></li>
          
          <li :class="{'page-item disabled' : pagination.current_page == pagination.last_page,
          'page-item' : pagination.current_page != pagination.last_page
           }" class="page-item"><a href="#" @click.prevent="changePage(pagination.current_page +1)" class="page-link"><span>&raquo;</span></a></li>       
        </ul>
      </nav>
    <!-- end buttons -->
    </div>
</template>
<script>
	
	    export default {
        data(){
            return {
                proveedores: [],
                pagination:{
                 'total': 0,
                 'current_page':0,
                 'per_page': 0,
                 'last_page': 0,
                 'from': 0,
                 'to': 0,                  
                },
                parametro: '',
                resultados: 0,


            }
        },
        mounted(){
          this.getProveedoresByName()
        },
        computed:{
            isActived: function(){
              return this.pagination.current_page
            },
            pagesNumber: function(){
              if(!this.pagination.to){
                return [];
              }
              var from = this.pagination.current_page  - 2//to do
              if(from<1){
                from = 1;
              }

              var to = from + (2*2); //to do
              if(to>=this.pagination.last_page){
                to=this.pagination.last_page
              }

              var pagesArray = [];
              while(from<=to){
                pagesArray.push(from);
                from++;
              }
              return pagesArray;
            }

        },
        methods:{
          getProveedoresByName(page){
                try{
                    if(this.parametro != ''){
                        axios.get('/proveedor/proveedores/json/getproveedores/' + this.parametro + '?page=1').then(res =>{
                        this.proveedores = res.data.proveedores.data
                        this.pagination = res.data.pagination
                        }) 

                    }else{
                        axios.get('/proveedor/proveedores/json/getproveedores/*?page=' + page).then(res=>{
                        this.proveedores = res.data.proveedores.data
                        this.pagination = res.data.pagination
          })
                    }              
                }catch(error){
                    console.log("error obteniendo la lista de proveedores por nombre");
                }
                return this.proveedores;
            },
            changePage(page){
              this.pagination.current_page = page
              this.getProveedoresByName(page)
              //window.scrollTo(0,0);
            }
        }
    }


</script>


