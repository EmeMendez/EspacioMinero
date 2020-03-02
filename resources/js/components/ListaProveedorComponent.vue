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

    <div v-if="!a">
        <!-- <img width="50" height="50" src="/images/loading/loading.gif" alt=""> -->
       

        <!-- jjjfjffjfj -->

    <label id="results" class="lead pb-3">Resultados : </label>

      <div class="card mb-3" v-for="p in proveedores" :key="p">
      <div class="row no-gutters">
          <div class="col-md-2 col-12 text-center my-auto">
              <img src="/images/carga.png" width="150" height="150">
          </div>
              <div>
          </div>
          <div class="col-md-8 col-12">
            <div class="card-body">
            <h5 class="card-title text-left text-light bg-light">&nbsp</h5>
            <p class="card-text multine-ellipsis text-justify text-light bg-light py-auto">&nbsp<br>&nbsp<br>&nbsp<br></p>
            <a class="button button-sm button-winona ml-0 text-light bg-light" >Más Información</a>            
          </div>
        </div>
      </div>
      </div>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>












    </div>
    <div v-else>
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
            
          
              <a v-if="tipo"  data-toggle="modal" data-target="#exampleModal" class="button button-sm button-default-outline button-winona ml-0" > Más Información</a>            
              
            
            
            </div>
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
                tipo: false,
                nombres : ['melon','nani','silver'],
                a: null,
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
          this.cargo();
          this.getProveedoresByName();
          this.tipoUsuario();
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
            },
            cargo(){
                setTimeout(()=>{
                  this.a = true
                },2000);                
                  return this.a;
            },
            tipoUsuario(){
                        axios.get('/tiposession').then(res=>{
                        var proveedor = res.data.proveedor;
                        var invitado = res.data.invitado;
                        var ciaminero = res.data.ciaminera;
                        var tipo = "";
                        if(proveedor!=null){
                          tipo = "proveedor";
                        }else if(invitado==true){
                          tipo = "invitado"
                        }
                        else{
                          tipo = "ciaminera";
                        }
                        console.log(tipo)
                        this.tipo=true;
                        
          })
            }
        }
    }


</script>


