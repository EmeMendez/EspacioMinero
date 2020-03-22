<template>
  <div class="container">
    <!--Start search-->
    <div class="row py-0 align-items-center pb-3 mt-0">
        <div class="col-3 d-none d-md-block"></div> <!-- end col-3 -->               
        <div class="col-12 col-md-9">
          <div class="form-wrap">
            <div class="row align-items-center">
              <div class="col-md-8 col-10">
                    <div class="dropdown" >
                        <input @keyup.enter="addArray()" v-if="Object.keys(selectedItem).length === 0" ref="dropdowninput" v-model.trim="inputValue" class="form-input" type="text" placeholder="Buscar por rubro o servicio" />
                        <div v-else @click="resetSelection" class="form-input" style="background-color:#f0f3f5">
                            <img src="https://image.flaticon.com/icons/png/512/24/24141.png" class="dropdown-item-flag" />                            
                            <span>{{ selectedItem.nombre }}</span>
                        </div><!--end dropdown-selected-->
                        <div v-show="inputValue" class="dropdown-list">
                            <div @click="selectItem(item,item.id,item.nombre)" v-show="itemVisible(item)" v-for="(item,index) in itemList" :key="index" class="dropdown-item">
                                <img src="https://image.flaticon.com/icons/png/512/24/24141.png" class="dropdown-item-flag" />
                                <span>{{ item.nombre }}</span>
                            </div><!--end dropdown-item-->
                        </div><!--end dropdown-list-->
                    </div><!--end dropdown-->              
              </div>
              <div class="col-1">
                  <button  @click="addArray()" class="btn btn-success">+</button>
              </div>
              <div class="col-md-3 mt-md-0 col-12 mt-3">
                  <button  @click="getProveedores(1)" class="button button-block button-primary ml-0 col-md-12 col-7 mx-auto py-md-3 py-2 ">Buscar</button>                        
              </div>
              </div>
          </div>
        </div><!-- end col-9 -->    
    </div><!-- end Search -->


    <div class="row">
        <div class="col-12 pl-0 ml-0 bg-light pb-2">
            <ul >
                <li style="float: left"><span class="badge py-2 mt-2 bg-light text-dark">Filtros de Busqueda : </span><span v-if="categoria=='' && tamanio_empresa=='' && region=='' && search_parameters.length==0" class="badge py-2 mt-2 bg-light text-dark">Ninguno</span></li>
                <li v-if="categoria!=''" style="float: left;margin-left:1.25em"><span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">{{categoria}}&nbsp;&nbsp;&nbsp<a @click.prevent="rebobinar(1)" href="#" class="text-danger">x</a></span></li>
                <li v-if="tamanio_empresa!=''" style="float: left;margin-left:1.25em"><span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">{{tamanio_empresa}}&nbsp;&nbsp;&nbsp<a @click.prevent="rebobinar(2)" href="#" class="text-danger">x</a></span></li>  
                <li v-if="region!=''" style="float: left;margin-left:1.25em"><span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">{{region}}&nbsp;&nbsp;&nbsp<a @click.prevent="rebobinar(3)" href="#" class="text-danger">x</a></span></li>  
                <li style="float: left;margin-left:1.25em" v-for="(s,sk) in search_parameters" :key="'a' + sk">      <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">{{s}}&nbsp;&nbsp;&nbsp<a @click.prevent="deleteItem(sk)" href="#" class="text-danger">x</a></span> </li>
            </ul>
        </div>
     </div>

    <div class="row mt-3">
        <div class="col-3 px-0  d-none d-md-block">
          <label id="results" class="pb-1 mt-0">&nbsp</label>
          <div class="card">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-6">
                  <span>Filtros</span>              
                </div>
                <div class="col-6 text-right">
                  <img height="20" width="20" src="/images/filter.png" alt="">
                </div>
              </div>
              <div class="accordion" id="accordionExample">

                <!-- Category -->
                <div class="card" style="border-radius:0px;">
                  <div class="card-header p-0" id="headingTipo">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTipo" aria-expanded="true" aria-controls="collapseTipo">Tipo de Servicio</button>
                    </h2>
                  </div>
                  <div id="collapseTipo" class="collapse" aria-labelledby="headingTipo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div v-for="(cat,index_categoria) in categorias" :key="'c'+index_categoria" class="form-group form-check mb-0">
                            <input :value="cat.nombre" v-model="categoria" type="radio" class="form-check-input mb-0" :id="'cat'+cat.id">
                            <label class="form-check-label" :for="'cat'+cat.id">{{cat.nombre}}</label>
                        </div>
                        <div class="form-group form-check mb-0">
                          <a href="#" @click.prevent="rebobinar(1)" class="stretched-link text-primary"><u>Quitar filtro</u></a>
                      </div>
                    </div>
                  </div>
                </div><!-- end Category (tipo empresa) -->



                <!-- Cities -->
                <div class="card" style="border-radius:0px;">
                  <div class="card-header p-0" id="headingRegion">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseRegion" aria-expanded="true" aria-controls="collapseRegion">Ubicación (región)</button>
                    </h2>
                  </div>
                  <div id="collapseRegion" class="collapse" aria-labelledby="headingRegion" data-parent="#accordionExample">
                    <div class="card-body">
                        <div v-for="(reg,index_reg) in regiones" :key="'r'+index_reg" class="form-group form-check mb-0">
                            <input :value="reg.nombre" v-model="region" type="radio" class="form-check-input mb-0" :id="'reg'+reg.id">
                            <label class="form-check-label" :for="'cat'+reg.id">{{reg.ordinal}} - {{reg.nombre}}</label>
                        </div>
                        <div class="form-group form-check mb-0">
                          <a href="#" @click.prevent="rebobinar(3)" class="stretched-link text-primary"><u>Quitar filtro</u></a>
                      </div>
                    </div>
                  </div>
                </div><!-- end Cities (ciuades) -->



                <!-- start TamanioEmpresa -->                
                <div class="card" style="border-radius:0px;">
                  <div class="card-header p-0" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Tamaño de Empresa
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <div v-for="(te,index_te) in tamanio_empresas" :key="'t'+index_te" class="form-group form-check mb-0">
                            <input :value="te.nombre" v-model="tamanio_empresa" type="radio" class="form-check-input mb-0" :id="'te'+te.id">
                            <label class="form-check-label" :for="'te'+te.id">{{te.nombre}}</label>
                      </div> 
                      <div class="form-group form-check mb-0">
                          <a href="#" @click.prevent="rebobinar(2)" name="tamanio_empresa" class="stretched-link text-primary"><u>Quitar filtro</u></a>
                      </div> 
                    </div>
                  </div>
                </div><!-- End Tamanio Empresa --> 
              </div>              
            </div>
          </div>
        </div>

        <div class="col-12 col-md-9 ">
            <div v-if="!loading"><!-- fake loading -->      
            <label id="results" class="pb-1 mt-0">Resultados : </label>
              <div class="card  py-3 px-2" v-for="(fake, fake_index) in proveedores" :key="'fake' + fake_index">
                <div class="row no-gutters">
                  <div class="col-md-1 col-12 text-center">
                    <img src="/images/carga.png"  class="img-fluid col-5 col-md-12  px-2 w-100">
                  </div>
                  <div class="col-md-10 col-12">
                    <div class="card-body p-0">

                      <div class="row">
                        <div class="col-12 col-md-9 text-md-left text-center">
                            <h5 class="card-title text-left text-light bg-light mb-0">&nbsp</h5>
                        </div>
                        <div class="col-12 col-md-3 text-md-right text-center">
                            <span class="small font-weight-bold d-inline bg-light col-12">&nbsp</span>                      
                        </div>                                              
                      </div>
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

            <!-- Start Provider List -->
            <div v-else>
       
            <div class="row">
              <div class="col-4">
                <label id="results" class="pb-1 mt-md-0 mt-2">Resultados : {{pagination.total}}</label>
              </div>
              <div class="col-8 text-right">
             <nav class="navbar navbar-expand-lg navbar-light bg-light d-md-none pt-0 pr-0">
                 <h3 class="navbar-brand pl-3">Filtros</h3>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                

                <div class="collapse navbar-collapse position-absolute mr-5" id="navbarNavDropdown">

                <!-- Category -->
                <div class="card" style="border-radius:0px;">
                  <div class="card-header p-0" id="headingTipo">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTipo" aria-expanded="true" aria-controls="collapseTipo">Tipo de Servicio</button>
                    </h2>
                  </div>
                  <div id="collapseTipo" class="collapse" aria-labelledby="headingTipo" data-parent="#accordionExample">
                    <div class="card-body text-left">
                        <div v-for="(cat,index_categoria) in categorias" :key="'c'+index_categoria" class="form-group form-check mb-0">
                            <input :value="cat.nombre" v-model="categoria" type="radio" class="form-check-input mb-0" :id="'cat'+cat.id">
                            <label class="form-check-label" :for="'cat'+cat.id">{{cat.nombre}}</label>
                        </div>
                        <div class="form-group form-check mb-0">
                          <a href="#" @click.prevent="rebobinar(1)" class="stretched-link text-primary"><u>Quitar filtro</u></a>
                      </div>
                    </div>
                  </div>
                </div><!-- end Category (tipo empresa) -->

                <!-- start TamanioEmpresa -->                
                <div class="card" style="border-radius:0px;">
                  <div class="card-header p-0" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Tamaño de Empresa
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body text-left">
                      <div v-for="(te,index_te) in tamanio_empresas" :key="'t'+index_te" class="form-group form-check mb-0">
                            <input :value="te.nombre" v-model="tamanio_empresa" type="radio" class="form-check-input mb-0" :id="'te'+te.id">
                            <label class="form-check-label" :for="'te'+te.id">{{te.nombre}}</label>
                      </div> 
                      <div class="form-group form-check mb-0">
                          <a href="#" @click.prevent="rebobinar(2)" name="tamanio_empresa" class="stretched-link text-primary"><u>Quitar filtro</u></a>
                      </div> 
                    </div>
                  </div>
                </div><!-- End Tamanio Empresa --> 

                                <!-- Cities -->
                <div class="card" style="border-radius:0px;">
                  <div class="card-header p-0" id="headingRegion">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseRegion" aria-expanded="true" aria-controls="collapseRegion">Ubicación (región)</button>
                    </h2>
                  </div>
                  <div id="collapseRegion" class="collapse" aria-labelledby="headingRegion" data-parent="#accordionExample">
                    <div class="card-body text-left">
                        <div v-for="(reg,index_reg) in regiones" :key="'r'+index_reg" class="form-group form-check mb-0">
                            <input :value="reg.nombre" v-model="region" type="radio" class="form-check-input mb-0" :id="'reg'+reg.id">
                            <label class="form-check-label" :for="'cat'+reg.id">{{reg.ordinal}} - {{reg.nombre}}</label>
                        </div>
                        <div class="form-group form-check mb-0">
                          <a href="#" @click.prevent="rebobinar(3)" class="stretched-link text-primary"><u>Quitar filtro</u></a>
                      </div>
                    </div>
                  </div>
                </div><!-- end Cities (ciuades) -->


                </div>
              </nav>
              </div>
            </div>





              <div style="position: inherit" class="card card py-3 px-2" v-for="(p, index_proveedor) in proveedores" v-bind:key="'p' + index_proveedor">
                <div class="row no-gutters">
                  <div class="col-md-1 col-12 text-center">
                    <img :src="'/' + p.imagen" class="img-fluid col-5 col-md-12  px-2 w-100">
                  </div>
                  <div class="col-md-10 col-12">
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-12 col-md-9 text-md-left text-center">
                          <h5 class="card-title mb-0 text-uppercase" v-text="p.nombre"></h5>
                        </div>
                        <div class="col-12 col-md-3 text-md-right text-center">
                            <span class="small font-weight-bold d-inline" v-text="p.ciudad_nombre"></span>                        
                        </div>                                              
                      </div>
                      <p class="card-text multine-ellipsis text-justify mt-0 small mx-md-0 mx-3"  v-text="p.descripcion"></p>                                                 
                      <div class="small pb-2 mx-md-0 mx-3">
                          <proveedor-tags-component :proveedor_rut="p.rut"/>
                      </div> 
                      <div class="text-center text-md-left">
                          <button class="button button-sm button-default-outline  ml-0  py-2 px-3 mt-0" v-if="guest"><a    data-toggle="modal" data-target="#exampleModalCenter"><span class="small"><b>Más Información</b></span></a></button>                      
                          <button class="button button-sm button-default-outline  ml-0 py-2 px-3 mt-0" v-if="!guest" ><a  :href="'/proveedor/perfil/' + p.url" ><span class="small"><b>Más Información</b></span></a></button>                      
                      </div>                     
                      
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          <!-- end Provider List --> 
          <!-- start paginate -->
          <nav v-if="proveedores.lenght>10"  class="pt-2">
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
        </div> <!-- end col-9 -->
    </div> <!-- end row -->

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
            <a href="/iniciar-sesion"> <button type="button" class="button button-primary py-2 px-md-5 px-4" data-dismiss="modal" >Inicia Sesión</button> </a>
            <a href="/choice"><button type="button" class="btn btn-secondary py-2 px-md-5 px-4">Regístrate</button></a>
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
                tamanio_empresa: '',
                categoria: '',
                region:'',

                search_parameters: [],
                tags : [],
                selectedItem: {},
                inputValue: '',
                itemList: [],

                guest: false,
                loading: false,
                proveedores: [],

                pagination:{
                 'total': 0,
                 'current_page':0,
                 'per_page': 0,
                 'last_page': 0,
                 'from': 0,
                 'to': 0,                  
                },
                resultados: 0,


                categorias:[],
                tamanio_empresas:[],
                regiones: []
            }
        },
        mounted(){
          this.getAll();
          this.getTags ();
          this.preloader(1500);
          this.getProveedores(1);
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
            changePage(page){
              this.pagination.current_page = page
              this.getProveedores(page)
            },
            preloader(time){
                setTimeout(()=>{this.loading = true},time);                
                  return this.loading;
            },
            tipoUsuario(){
                axios.get('/tiposession').then(res=>{
                var guest = res.data.guest;
                var invitado = res.data.invitado;
                var proveedor = res.data.proveedor;
                if(res.data.ciaminera == true){
                    this.guest=false;       
                }
                else if(proveedor != null){
                    this.guest=false;       
                }else if(invitado == true){
                    this.guest=false;       
                }else{
                  this.guest =true;
                }
              })
            },
            getAll(){
              axios.get("/regiones/provincias/ciudades/").then(res=>{
                this.categorias=res.data.categorias;
                this.tamanio_empresas=res.data.tamanio_empresa;
                this.regiones=res.data.regiones;
                this.tags = res.data.tags;
              })
            },
            resetSelection () {
                this.selectedItem = {}
                this.inputValue=''
                this.$nextTick( () => this.$refs.dropdowninput.focus() )
                this.$emit('on-item-reset')
            },
            selectItem (theItem,id,nombre) {
                this.tag_id=id;
                this.selectedItem = theItem 
                this.inputValue = ''
                this.$emit('on-item-selected', theItem)
            },
            itemVisible (item) {
                let currentName = item.nombre.toLowerCase()
                let currentInput = (this.inputValue.split(' ').join('-')).toLowerCase()
                return currentName.includes(currentInput)
            },
            getTags () {
                axios.get('/tag/tags/todos').then( response => {
                    this.itemList = response.data
                })
            },

            addArray(){
              if(this.inputValue!=''){
              this.search_parameters.push((this.inputValue.split(' ').join('-')).toLowerCase());
              this.inputValue= ''
              }
              else{
                if(this.selectedItem.nombre!=undefined){
                this.search_parameters.push((this.selectedItem.nombre).split(' ').join('-').toLowerCase());
                this.selectedItem = {}
                }
              }
            },
            deleteItem(index){
              this.search_parameters.splice(index,1)
              this.getProveedores(1);
            },

            getProveedores(page){
            if(this.categoria != '' || this.region != '' || this.tamanio_empresa !='' || this.search_parameters.length !=0){  
                axios.get('/proveedor/filter/proveedores/search?page='+page,{params:{toSearch: this.search_parameters,categoria: this.categoria,tamanio_empresa:this.tamanio_empresa,region: this.region}} ,
                                                                          {headers: {'Accept': 'application/json','Content-Type': 'application/json'}})
                      .then(res => {
                            this.proveedores = res.data.proveedores.data
                            this.pagination = res.data.pagination                         
                            this.loading=false
                            this.preloader(700);
                      }).catch(error => {/*nothing to do*/});   
            }
            else{
              axios.get('/proveedor/filter/proveedores/all?page='+page)
                      .then(res => {
                          this.proveedores = res.data.proveedores.data
                          this.pagination = res.data.pagination
                          this.loading=false
                          this.preloader(700);                   
                      }).catch(error => {/*nothing to do*/});
            
            }             
        },
        rebobinar(option){
          if(option==1){
            this.categoria='';
          }
          else if(option==2){
            this.tamanio_empresa='';
          }
          else if(option==3){
            this.region='';
          }
          this.getProveedores(1);

        }               
    }

}
</script>


