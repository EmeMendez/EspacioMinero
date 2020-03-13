<template>
  <div class="container">
          <ul>
            <li style="float: left;margin-left:1.25em" v-for="(s,sk) in search_parameters" :key="'a' + sk">      <span class="badge badge-primary py-2 mt-2" style="border-radius:5px;font-size:10px">{{s}}&nbsp;&nbsp;&nbsp<a @click.prevent="deleteItem(sk)" href="#" class="text-danger">x</a></span>  
            </li>
          </ul>
          <br>
    <!-- Buscardor proveedor -->
    <div class="row py-0 align-items-center pb-3">
        <div class="col-3">
        </div> <!-- end col-3 -->               
        <div class="col-9">
          <div class="form-wrap">
            <div class="row align-items-center">
              <div class="col-8">
                  <!-- <input v-model="parametro" placeholder="Buscar por rubro o servicio" class="form-input" id="provider-name" type="text" name="user-name" > -->
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
                  <!-- <button  @click="getProveedoresByName" class="button button-block button-primary">Buscar</button>           -->
                  <button  @click="addArray()" class="btn btn-success">+</button>
              
              </div>
              <div class="col-3">
                  <!-- <button  @click="getProveedoresByName" class="button button-block button-primary">Buscar</button>           -->
                  <button  @click="post()" class="button button-block button-primary">Buscar</button>                        
              </div>
              </div>
          </div>
        </div><!-- end col-9 -->    
    </div><!-- Fin Buscador -->

    <div class="row mt-3">
        <div class="col-3 px-0">
          <label id="results" class="pb-1 mt-0">&nbsp</label>
          <div class="card">
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
                        <div v-for="(cat,index_categoria) in categorias" :key="'c'+index_categoria" class="form-group form-check mb-0">
                            <input type="checkbox" class="form-check-input mb-0" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">{{cat.nombre}}</label>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Start CARD CATEGORÍA EMPRESA (tipo empresa) -->
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
                      <div v-for="(te,index_te) in tamanio_empresas" :key="'t'+index_te" class="form-group form-check mb-0">
                        <input type="checkbox" class="form-check-input mb-0" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">{{te.nombre}}</label>
                      </div>        
                    </div>
                  </div>
                </div>
                <!-- End CARD CATEGORÍA -->
              </div>              
            </div>
          </div>
        </div>

        <div class="col-9">
          <!-- inicio de la lista -->
            <div v-if="!loading"><!-- fake loading -->      
            <label id="results" class="pb-1 mt-0">Resultados : </label>
              <div class="card  py-3 px-2" v-for="(fake, fake_index) in proveedores" :key="'fake' + fake_index">
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
            <label id="results" class="pb-1">Resultados : {{pagination.total}}</label>
              <div style="position: inherit" class="card card py-3 px-2" v-for="(p, index_proveedor) in proveedores" v-bind:key="'p' + index_proveedor">
                <div class="row no-gutters">
                  <div class="col-md-1 col-12 text-center">
                    <img :src="'/' + p.imagen" width="50" height="50">
                  </div>
                  <div class="col-md-10 col-12">
                    <div class="card-body p-0">
                      <div class="row">
                        <div class="col-9">
                          <h5 class="card-title mb-0" v-text="p.nombre"></h5>
                        </div>
                        <div class="col-3 text-right">
                            <span class="small font-weight-bold d-inline" v-text="p.ciudad_nombre"></span>                        
                        </div>                                              
                      </div>
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
                search_parameters: [],
                tags : [],
                selectedItem: {},
                inputValue: '',
                itemList: [],


                invitado: false,
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
                regiones :[],
            }
        },
        mounted(){
          // this.getAll();
          this.getTags ();
          // this.cargo(1500);
          // this.getProveedoresByName();
          // this.tipoUsuario();


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
                    if(this.inputValue != ''){
                        axios.get('/proveedor/proveedores/json/getproveedores/' + this.inputValue + '?page=1').then(res =>{
                        this.proveedores = res.data.proveedores.data
                        this.pagination = res.data.pagination
                        this.loading=false
                        this.cargo(700);
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
                this.categorias=res.data.categorias;
                this.tamanio_empresas=res.data.tamanio_empresa;
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
                    axios.get('/tag/tags').then( response => {
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
                },
                post(){
                  
                axios.post('/proveedor/post/proveedores',{
                        toSearch: this.search_parameters
                        } ,{
                        headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                        }                    
                    }).then(response => {
                       console.log(response);
                    }).catch(error => {
                         
                });                
                }

    }

}
</script>


