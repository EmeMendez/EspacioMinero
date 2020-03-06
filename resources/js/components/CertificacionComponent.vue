<template>
        <div class="row mx-auto">

            <div class="col-12 pl-0">
                <h3 class="text-center mb-4">Certificaciones</h3>
                <h5 class="py-3 text-center">Añade tus certificaciones</h5>
                <p>Mis certificaciones</p>
            </div> <!--end col-12-->

            <div class="bg-light col-12 p-0">                  
                <div v-if="this.proveedor_certifications.length>0" class="p-4">
                    <div class="d-inline" v-for="(c, i) in this.proveedor_certifications" :key="i">
                        <div v-if="i<=3" class="card mb-2">
                            <div class="card-body py-1">
                                {{c.nombre}}
                                <a class="text-danger pl-3 font-weight-bold" @click.prevent="deleteProveedorCertification(c.certificacion_id)" href="#">x</a>                                                            
                            </div>
                        </div>


                    </div>
                    <div>
                        <div class="col pl-0">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="d-inline" v-for="(c, i) in this.proveedor_certifications" :key="i">
                                    <div v-if="i>3" class="card mb-2">
                                        <div class="card-body py-1">
                                            {{c.nombre}}
                                            <a class="text-danger pl-3 font-weight-bold" @click.prevent="deleteProveedorCertification(c.certificacion_id)" href="#">x</a>                                                                        
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <a @click="change_btn_text()" v-if="this.proveedor_certifications.length>4" class="text-primary pl-2" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><u>{{this.btn_text}}</u></a>
                    </div>


                </div><!-- end if -->
                <div class="py-4" v-else>
                    <div class="alert alert-light bg-light mb-0" role="alert">
                        Oops! aún no has agregado ninguna certifiación
                    </div>         
                </div> <!--end else-->            
            </div><!--end bg-light col-12-->



        <div class="container py-3">
            <p class="mb-2">Buscar certificación</p>
            <div class="row align-items-center mt-0">
                <div class="col-12 col-md-10">
                    <div class="dropdown" >
                        <input v-if="Object.keys(selectedItem).length === 0" ref="dropdowninput" v-model.trim="inputValue" class="dropdown-input" type="text" placeholder="Buscar por nombre" />
                        <div v-else @click="resetSelection" class="dropdown-selected">
                            <!-- <img src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/search-512.png" class="dropdown-item-flag" /> -->
                            <img src="https://image.flaticon.com/icons/png/512/837/premium/837819.png" class="dropdown-item-flag" />                            
                            <span>{{ selectedItem.nombre }}</span>
                        </div><!--end dropdown-selected-->
                        <div v-show="inputValue && apiLoaded" class="dropdown-list">
                            <div @click="selectItem(item,item.id)" v-show="itemVisible(item)" v-for="(item,index) in itemList" :key="index" class="dropdown-item">
                                <img src="https://image.flaticon.com/icons/png/512/837/premium/837819.png" class="dropdown-item-flag" />
                                <span>{{ item.nombre }}</span>
                            </div><!--end dropdown-item-->
                        </div><!--end dropdown-list-->
                    </div><!--end dropdown-->
                </div><!--end col-9-->
                <div class="col-12 col-md-2 mt-md-0 mt-2 text-center">
                    <button @click="storeProveedorCertifications()" class="btn btn-success">Agregar</button>
                </div><!--end col-3-->
            </div><!--end row -->
        </div><!--end container -->





        
        </div>
</template>

<script>
    export default {
        data(){
            return {
                proveedor_certifications:[],
                certifications : [],
                proveedor_rut: '',
                certificacion_id: '',
                btn_text: 'Mostar todas',
                show_button: false,
                selectedItem: {},
                inputValue: '',
                itemList: [],
                apiLoaded: true,
                apiUrl: '/certificacion/certificaciones',
                id: ''
            }
        },
        mounted(){
            this.getProveedorCertifications();
            this.getCertifications();
            this.getList()
        },
        methods:{
               getCertifications(){
                   axios.get('/certificacion/certificaciones').then(res=>{
                       this.certifications = res.data;
                   })
               },
               getProveedorCertifications(){
                axios.get('/proveedor/certificacion').then(res =>{
                    this.proveedor_certifications=res.data.certificaciones
                    this.proveedor_rut = res.data.rut
                })                   
               },
               storeProveedorCertifications(){
                    axios.post('/proveedor/certificacion/store',{
                        proveedor_rut: this.proveedor_rut,
                        certificacion_id: this.id
                        } ,{
                        headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                        }                    
                    }).then(response => {
                        if(response.status==200){
                            toastr.success('Certificación añadida')
                            this.getProveedorCertifications()
                            this.getList()
                            this.resetSelection()
                        }
                    }).catch(error => {
                            toastr.error('Ingrese una certificación válida')
                });
                },
                change_btn_text(){
                    this.show_button = !this.show_button
                    if(!this.show_button){
                        this.btn_text='Mostar todas'
                    }else{
                         this.btn_text='Ver menos'                       
                    }
                },
                deleteProveedorCertification(certification_id){
                    axios.delete('/proveedor/certificacion',{data:{
                        proveedor_rut: this.proveedor_rut,
                        certificacion_id: certification_id
                        }} ,{
                        headers: {
                            'Accept': 'application/json',
                        'Content-Type': 'application/json'
                        }                    
                    }).then(response => {
                        if(response.status==200){
                            toastr.info("Certificación Eliminada");
                            this.getProveedorCertifications()
                            this.getList()
                        }
                    });











                },
                resetSelection () {
                    this.selectedItem = {}
                    this.$nextTick( () => this.$refs.dropdowninput.focus() )
                    this.$emit('on-item-reset')
                },
                selectItem (theItem,id) {
                    this.id=id;
                    this.selectedItem = theItem 
                    this.inputValue = ''
                    this.$emit('on-item-selected', theItem)
                },
                itemVisible (item) {
                    let currentName = item.nombre.toLowerCase()
                    let currentInput = this.inputValue.toLowerCase()
                    return currentName.includes(currentInput)
                },
                getList () {
                    axios.get(this.apiUrl).then( response => {
                        this.itemList = response.data
                        this.apiLoaded = true
                    })
                },               
        }

    }
</script>