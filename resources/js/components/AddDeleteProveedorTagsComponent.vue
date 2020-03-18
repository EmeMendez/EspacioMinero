<template>
        <div class="row mx-auto">

            <div class="col-12 pl-0">
                <h3 class="text-center mb-4">Rubro y servicios</h3>
                <h5 class="py-3 text-center">Añade tus Servicios</h5>
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading"><strong>Importante!</strong> - Acerca de tu rubros y servicios</h4>
                    <p>En este espacio podrás añadir un <strong>máximo de 10 servicios</strong>. Puedes añadirlos desde nuestra lista, o bien agregar servicios de manera personalizada, sé cuidadoso, ya que te servirán para que cualquiera que requiere tus servicios pueda encontrarte de manera mucho más fácil y rápida!.</p>
                    <hr>
                    <p class="mb-0">Puedes agregar y eliminar servicios las veces que quieras.</p>
                </div>                
                <p>Mis Servicios</p>
            </div> <!--end col-12-->

            <div class="bg-light col-12 p-0">                  
                <div v-if="this.proveedor_tags.length>0" class="p-4">
                    <div class="d-inline" v-for="(t, i) in this.proveedor_tags" :key="i">
                        <div class="card mb-2">
                            <div class="card-body py-1">
                                <small class="d-inline">{{i+1}}.</small> {{t.nombre}}
                                <a class="text-danger pl-3 font-weight-bold" @click.prevent="deleteProveedorTag(t.id)" href="#">x</a>                                                            
                            </div>
                        </div>
                    </div>
                </div><!-- end if -->
                <div class="py-4" v-else>
                    <div class="alert alert-light bg-light mb-0" role="alert">
                        Oops! al parecer aún no has añadido ningún servicio 
                    </div>         
                </div> <!--end else-->            
            </div><!--end bg-light col-12-->



        <div class="container py-3">
            <p class="mb-2">Buscar Servicios o añadir uno propio</p>
            <div class="row align-items-center mt-0">
                <div class="col-12 col-md-9">
                    <div class="dropdown" >
                        <input v-if="Object.keys(selectedItem).length === 0" ref="dropdowninput" v-model.trim="inputValue" class="form-input" type="text" placeholder="Buscar por nombre" />
                        <div v-else @click="resetSelection" class="form-input" style="background-color:#f0f3f5">
                            <img src="https://image.flaticon.com/icons/png/512/24/24141.png" class="dropdown-item-flag" />                            
                            <span>{{ selectedItem.nombre }}</span>
                        </div><!--end dropdown-selected-->
                        <div v-show="inputValue" class="dropdown-list">
                            <div @click="selectItem(item,item.id)" v-show="itemVisible(item)" v-for="(item,index) in itemList" :key="index" class="dropdown-item">
                                <img src="https://image.flaticon.com/icons/png/512/24/24141.png" class="dropdown-item-flag" />
                                <span>{{ item.nombre }}</span>
                            </div><!--end dropdown-item-->
                        </div><!--end dropdown-list-->
                    </div><!--end dropdown-->
                </div><!--end col-9-->
                <div class="col-12 col-md-3 mt-md-0 mt-2 text-center">
                    <button @click="storeProveedorTag()" class="btn btn-success">Agregar</button>
                </div><!--end col-3-->
            </div><!--end row -->
        </div><!--end container -->





        
        </div>
</template>

<script>
    export default {
        data(){
            return {
                
                proveedor_tags:[],
                tags : [],
                proveedor_rut: '',
                tag_id: '',

                selectedItem: {},
                inputValue: '',
                itemList: [],
                id: ''
            }
        },
        mounted(){
            this.getProveedorTags();
            this.getTags();
        },
        methods:{
               storeTag(){
                    axios.post('/tag/store/tag',{
                        nombre: (this.inputValue.split(' ').join('-')).toLowerCase()
                        } ,{
                        headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                        }                    
                    }).then(response => {
                        if(response.status==200){  
                           toastr.info('Ya añadió este servicio')
                        }
                        if(response.status==201){  
                           toastr.success('Servicio añadido')
                            this.getProveedorTags()
                            this.getTags()
                            this.resetSelection()
                            this.tag_id=''
                        }
                        
                    }).catch(error => {
                        toastr.error("ha ocurrido un error añadiendo el servicio");
 
                });
                   
               },
               getProveedorTags(){
                axios.get('/proveedor-tags').then(res =>{
                    this.proveedor_tags =   res.data.tags
                    this.proveedor_rut  =   res.data.proveedor_rut
                })                   
               },
               storeProveedorTag(){
                if(this.proveedor_tags.length<=9){   
                    axios.post('/proveedor_tag/store/tag',{
                        proveedor_rut: this.proveedor_rut,
                        tag_id: this.tag_id
                        } ,{
                        headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                        }                    
                    }).then(response => {
                        console.log(response);
                        if(response.status==200){ 
                            console.log(response);                   
                            toastr.success('Servicio añadido')
                            this.getProveedorTags()
                            this.getTags()
                            this.resetSelection()
                            this.tag_id=''
                        }
                    }).catch(error => {
                        if(this.tag_id == '' && this.inputValue==''){
                        toastr.error('Ingrese un servicio válido')
                        }
                        if(this.inputValue!=''){
                            this.storeTag();
                            this.inputValue='';
                        }
                        console.log(error);                   

 
                });
                }else{
                        toastr.error('Ya no puedes añadir más servicios')
                }
                },
                deleteProveedorTag(id){
                    axios.delete('/proveedor_tag/delete/tag',{data:{
                        id: id
                        }} ,{
                        headers: {
                            'Accept': 'application/json',
                        'Content-Type': 'application/json'
                        }                    
                    }).then(response => {
                        if(response.status==200){
                            toastr.info("Servicio Eliminado");
                            this.getProveedorTags()
                            this.getTags()
                            
                        }
                    });
                },
                resetSelection () {
                    this.selectedItem = {}
                    this.inputValue=''
                    this.$nextTick( () => this.$refs.dropdowninput.focus() )
                    this.$emit('on-item-reset')
                },
                selectItem (theItem,id) {
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
        }

    }
</script>