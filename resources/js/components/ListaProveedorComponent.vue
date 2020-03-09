<template>
  <div class="container">
    <div class="form-input">
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
    <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">Palas <a href="#" class="text-danger">x</a></span>
   
    </div>


        <!-- Buscardor proveedor -->
              <div class="row py-0">
        <div class="col-3">
          <p class="lead">Titulo de los filtros</p>
                        <label id="results" class="lead pb-3">Resultados : </label>

        </div>        
        <div class="col-9">
          <div class="form-wrap">
            <div class="row">
              <div class="col-9">
                  <input  v-model="parametro" placeholder="Buscar por rubro o servicio" class="form-input" id="provider-name" type="text" name="user-name" >
              </div>
              <div class="col-3">
                  <button  @click="getProveedoresByName" class="button button-block button-primary">Buscar</button>          
              </div>
              </div>
          </div>
        </div>
      </div>
    <!-- Fin Buscador -->
      <div class="row mt-0">
        <div class="col-3 px-0">
        <div class="card mt-5">
            <div class="card-body">
              <img height="30" width="30" src="https://i.ya-webdesign.com/images/filter-icon-png-3.png" alt="">
              Filtros
        <div class="accordion" id="accordionExample">
        <!-- tipo servicio -->
        <div class="card" style="border-radius:0px;">
          <div class="card-header p-0" id="headingTipo">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTipo" aria-expanded="true" aria-controls="collapseTipo">
                Tipo de Servicio
              </button>
            </h2>
          </div>

          <div id="collapseTipo" class="collapse" aria-labelledby="headingTipo" data-parent="#accordionExample">
            <div class="card-body">
                <div v-for="(cat,c) in categorias" :key="'c'+c" class="form-group form-check mb-0">
                    <input type="checkbox" class="form-check-input mb-0" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">{{cat.nombre}}</label>
                </div>
            </div>
          </div>
        </div>
        <!-- tipo servicio -->


  <div class="card" style="border-radius:0px;">
    <div class="card-header p-0" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Ubicación
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body p-0">
      <div class="accordion" id="accordion_region">
          <div v-for="(reg,r) in regiones" :key="'r'+r" class="card">
            <div class="card-header p-0" id="heading_region">
              <h2 class="mb-0">
                <div class="row align-items-center">
                  <div class="col-9">
                    <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#collapse' + reg.ordinal" aria-expanded="true" :aria-controls="'collapse' + reg.ordinal">
                        <span class="small">{{reg.ordinal }} - {{reg.nombre}}</span>
                    </button>
                  </div>
                  <div class="col-3">
                     <input class="small" type="checkbox">
                  </div>
                </div>              
              </h2>
            </div>
        
            <div :id="'collapse' + reg.ordinal" class="collapse" aria-labelledby="heading_region" data-parent="#accordion_region">
              <div class="card-body p-0">
                  
                  <!-- acordeon interno                -->
                    <provincia-component :region="reg.id"></provincia-component>
                  <!-- acordeon interno                -->

              </div>
            </div>
        </div>
      </div>

            
</div>

</div>
</div>
<div class="card" style="border-radius:0px;">
<div class="card-header p-0" id="headingThree">
<h2 class="mb-0">
<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
Tamaño de Empresa
</button>
</h2>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
<div class="card-body">
<div v-for="(te,t) in tamanio_empresas" :key="'t'+t" class="form-group form-check mb-0">
<input type="checkbox" class="form-check-input mb-0" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">{{te.nombre}}</label>
</div>        
</div>
</div>
</div>
</div>              
            </div>
        </div>




</div>









        <div class="col-9">
          <!-- inicio de la lista -->
            <div v-if="!loading"><!-- fake loading -->      
              <label id="results" class="lead pb-3 mt-0">Resultados : </label>
              <div class="card  py-3 px-2" v-for="p in proveedores" :key="p">
                <div class="row no-gutters">
                  <div class="col-md-1 col-12 text-center">
                    <img src="/images/carga.png"  width="50" height="50">
                  </div>
                  <div class="col-md-10 col-12">
                    <div class="card-body p-0">
                      <h5 class="card-title text-left text-light bg-light mb-0">&nbsp</h5>
                      <p class="small card-text multine-ellipsis text-justify text-light bg-light mt-0 small">&nbsp<br>&nbsp<br>&nbsp<br></p>
                      <div class="small pb-2">
                          <span class="badge bg-light  py-1 mt-2 font-weight-light col-12" style="border-radius:5px;font-size:10px">&nbsp</span>                                               
                        </div>                      
                      <a class="button button-sm button-winona text-light bg-light ml-0 py-2 px-3 mt-0 col-3" >&nbsp;&nbsp</a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- end fake loading -->

            <!-- true loading -->
            <div v-else>
              <label id="results" class="lead pb-3">Resultados : {{pagination.total}}</label>
              <div class="card card py-3 px-2" v-for="p in proveedores" v-bind:key="p.rut">
                <div class="row no-gutters">
                  <div class="col-md-1 col-12 text-center">
                    <img :src="'/storage/' + p.imagen.substr(6)" width="50" height="50">
                  </div>
                  <div class="col-md-10 col-12">
                    <div class="card-body p-0">
                      <h5 class="card-title mb-0" v-text="p.nombre"></h5>
                      <p class="card-text multine-ellipsis text-justify mt-0 small"  v-text="p.descripcion"></p>
                      <div class="small pb-2">
                          <proveedor-tags-component :proveedor_rut="p.rut"/>
                        </div>                      
                      <a v-if="invitado"  data-toggle="modal" data-target="#exampleModalCenter" class="button button-sm button-default-outline button-winona ml-0 py-2 px-3 mt-0" ><span class="small"><b>Más Información</b></span></a>                      
                      <a v-if="!invitado" class="button button-sm button-default-outline button-winona ml-0 py-2 px-3 mt-0" :href="'/proveedor/perfil/' + p.url" ><span class="small"><b>Más Información</b></span></a>                      
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          <!-- true loading --> 
          <!-- start paginate -->
          <nav v-if="proveedores.length >10" class="pt-2">
            <ul class="pagination">
              <li to="results" :class="{'page-item disabled' : pagination.current_page == 1, 'page-item' : pagination.current_page > 1}"  class="page-item">
                <a  href="#" @click.prevent="changePage(pagination.current_page -1)" class="page-link"><span>&laquo;</span></a>
              </li>
              <li v-for="page in pagesNumber" :key="page" :class="[ page == isActived ? 'active' : 'page-item' ]" class="page-item">
                <a href="#" class="page-link" @click.prevent="changePage(page)">{{page}}</a>
              </li>
              <li :class="{'page-item disabled' : pagination.current_page == pagination.last_page,'page-item' : pagination.current_page != pagination.last_page}" class="page-item">
                <a href="#" @click.prevent="changePage(pagination.current_page +1)" class="page-link"><span>&raquo;</span></a>
              </li>       
            </ul>
          </nav>
        <!-- end paginate -->       
        </div>
      </div>



    


  <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Regístrate o Inicia Sesión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;  </span>
            </button>
          </div>
          <div class="modal-body">
            Para poder ver la información de este proveedor, necesitas registrarte o si ya tienes una cuenta ¡Inicia Sesión! 
          </div>
          <div class="modal-footer">
            <a href="/iniciar-sesion"> <button type="button" class="button button-primary py-2 px-5" data-dismiss="modal" >Inicia Sesión</button> </a>
            <a href="/proveedor/registrarse"><button type="button" class="btn btn-secondary py-2 px-5">Regístrate</button></a>
          </div>
        </div>
      </div>
    </div>



  </div>
</template>
<script>
	    export default {
        data(){
            return {
                invitado: false,
                loading: null,
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


                categorias:[],
                tamanio_empresas:[],
                regiones :[],
            }
        },
        mounted(){
          this.getAll();

          this.cargo(1500);
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
                        this.loading=false
                        this.cargo(1000);
                    }else{
                        axios.get('/proveedor/proveedores/json/getproveedores/*?page=' + page).then(res=>{
                        this.proveedores = res.data.proveedores.data
                        this.pagination = res.data.pagination
          })
                    }              
                }catch(error){
                    console.log("error obteniendo la lista de proveedores por nombre");
                }
            },
            changePage(page){
              this.pagination.current_page = page
              this.getProveedoresByName(page)
              //window.scrollTo(0,0);
            },
            cargo(time){
                setTimeout(()=>{
                  this.loading = true
                },time);                
                  return this.loading;
            },
            tipoUsuario(){
                axios.get('/tiposession').then(res=>{
                var invitado = res.data.invitado;
                var proveedor = res.data.proveedor;
                if(res.data.ciaminera == true){
                    this.invitado=false;       
                }
                else if(proveedor != null){
                    this.invitado=false;       
                }else{
                    this.invitado=true;       
                }
              })
            },
            getAll(){
              axios.get("/regiones/provincias/ciudades/").then(res=>{
                this.regiones = res.data.regiones;
                this.categorias=res.data.categorias;
                this.tamanio_empresas=res.data.tamanio_empresa;
              })
            }
             
            

    }

}
</script>


