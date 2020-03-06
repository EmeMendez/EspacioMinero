<template>
     <div>
         <!-- push del mal -->
         <input type="text"><button>agregar</button> 
          <hr class="mx-3">
         <p class="lead">Mis certificaciones</p>
         <div v-if="this.certifications.length>0">
            <span v-for="c in this.certifications" :key="c.rut" class="badge badge-primary my-2 mr-2">{{c.nombre}}<a class="text-danger pl-3 font-weight-bold" href="#">x</a></span>
         </div>
         <div v-else>
            <p class="lead">No tiene certificaciones</p>
         </div> 
    </div>   
</template>

<script>
    export default {
        data(){
            return {
              certifications:[]
            }
        },
        mounted(){
            this.getCertifications();
            this.storeCertifications();
        },
        methods:{
               getCertifications(){
                axios.get('/proveedor/certificacion').then(res =>{
                    console.log(res.data);
                    this.certifications=res.data
                    //return this.imagenMiniatura 
                })                   
               },
               storeCertifications(){
                axios.post('/proveedor/certificacion',{data: {melon: 'meloncito',melonium: 'melonium'}} ,{
                    headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                    }                    
                }).then(response => {
                    console.log("chikitri");
                    console.log(response);
                    });
           }
        }

    }
</script>